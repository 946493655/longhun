<?php
namespace App\Http\Controllers\Admin;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends BaseController
{
    /**
     * 系统后台控制器
     */

    protected $curr_url = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->model = new AdminModel();
    }

    public function index($genre=0)
    {
        $result = [
            'datas'=> $this->query($genre),
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
        ];
        return view('admin.admin.index', $result);
    }

    public function create()
    {
        $result = [
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '添加',
        ];
        return view('admin.admin.create',$result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['pwd'] = Hash::make('a12345');      //初始密码a12345
        $data['pwd_ori'] = PWD_INIT;      //初始密码a12345
        $data['created_at'] = time();
        AdminModel::create($data);
        return redirect(DOMAIN.'lhadmin/admin');
    }

    public function edit($id)
    {
        $result = [
            'data'=> AdminModel::find($id),
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '修改',
        ];
        return view('admin.admin.edit',$result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = time();
        AdminModel::where('id',$id)->update($data);
        return redirect(DOMAIN.'lhadmin/admin');
    }

    /**
     * 编辑资料
     */
    public function setting()
    {
        $adminId = $this->getAdminId();
        if (!AdminModel::find($adminId)->first()) {
            echo "<script>alert('管理员不存在！');history.go(-1);</script>";exit;
        }
        $result = [
            'data'=> AdminModel::find($adminId),
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '资料修改',
        ];
        return view('admin.admin.setting', $result);
    }

    /**
     * 更新资料
     */
    public function updateSetting(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = time();
        AdminModel::where('id',$id)->update($data);
        return redirect(DOMAIN.'lhadmin');
    }

    /**
     * 编辑密码
     */
    public function pwd()
    {
        $adminId = $this->getAdminId();
        if (!AdminModel::find($adminId)->first()) {
            echo "<script>alert('管理员不存在！');history.go(-1);</script>";exit;
        }
        $result = [
            'data'=> AdminModel::find($adminId),
//            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '密码修改',
        ];
        return view('admin.admin.pwd', $result);
    }

    /**
     * 更新密码
     */
    public function setPwd($pwd1,$pwd2)
    {
        $adminId = $this->getAdminId();
        $adminModel = AdminModel::find($adminId);
        if ($adminModel && !(Hash::check($pwd1, $adminModel->pwd))) {
            echo "<script>alert('原密码不对！');history.go(-1);</script>";exit;
        }
        if (!preg_match('/[a-zA-Z]/',$pwd2) || !preg_match('/\d+/',$pwd2)) {
            echo "<script>alert('新密码中必须要有数字和字母！');history.go(-1);</script>";exit;
        }
        if (preg_match("/[\x7f-\xff]/", $pwd2)) {
            echo "<script>alert('新密码中不能有中文！');history.go(-1);</script>";exit;
        }
        AdminModel::where('id',$adminId)->update(array('pwd'=>Hash::make($pwd2), 'pwd_ori'=>$pwd2, 'updated_at'=>time()));
        return redirect(DOMAIN.'lhadmin');
    }





    public function getData(Request $request)
    {
        if (!$request->name || !$request->realname || !$request->genre) {
            echo "<script>alert('昵称、真实姓名、类型必填！');history.go(-1);</script>";exit;
        }
        if (mb_strlen($request->name)<2 || mb_strlen($request->name)>6) {
            echo "<script>alert('昵称必须2-6个字符！');history.go(-1);</script>";exit;
        }
        if (mb_strlen($request->realname)<2) {
            echo "<script>alert('真实姓名至少2个字符！');history.go(-1);</script>";exit;
        }
        if (!$request->genre) {
            echo "<script>alert('管理类型必须！');history.go(-1);</script>";exit;
        }
        $data = [
            'username'=> $request->name,
            'realname'=> $request->realname,
            'genre'=> $request->genre,
        ];
        return $data;
    }

    public function query($genre)
    {
        $adminId = $this->getAdminId();     //排除当前登录人
        if ($genre) {
            $datas = AdminModel::where('genre',$genre)->where('id','<>',$adminId)->paginate($this->limit);
        } else {
            $datas = AdminModel::where('id','<>',$adminId)->paginate($this->limit);
        }
        return $datas;
    }

    /**
     * 获取当前登录id
     */
    public function getAdminId()
    {
        return Session::has('admin.uid') ? Session::get('admin.uid') : 0;
    }
}