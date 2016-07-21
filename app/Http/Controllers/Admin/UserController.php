<?php
namespace App\Http\Controllers\Admin;

use App\Models\IdentitysModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    /**
     * 系统后台控制器
     */

    protected $curr_url = 'user';

    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
    }

    public function index($genre=0)
    {
        $result = [
            'datas'=> $this->query($genre),
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
        ];
        return view('admin.user.index', $result);
    }

    public function create()
    {
        $result = [
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '添加',
        ];
        return view('admin.user.create',$result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['pwd'] = Hash::make(123456);      //初始密码123456
        $data['created_at'] = date('Y-m-d H:i:s',time());
        UserModel::create($data);
        //身份表
        $userModel = UserModel::where('username',$data['username'])->first();
        $this->addIdentity($userModel->id,$data['genre']);
        return redirect(DOMAIN.'lhadmin/user');
    }

    public function edit($id)
    {
        $result = [
            'data'=> UserModel::find($id),
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '修改',
        ];
        return view('admin.user.edit',$result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        UserModel::where('id',$id)->update($data);
        return redirect(DOMAIN.'lhadmin/user');
    }

    public function show($id)
    {
        $result = [
            'data'=> UserModel::find($id),
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '详情',
        ];
        return view('admin.user.show',$result);
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
        if ($genre) {
            $datas = UserModel::where('genre',$genre)->paginate($this->limit);
        } else {
            $datas = UserModel::paginate($this->limit);
        }
        return $datas;
    }

    /**
     *  更新身份表
     */
    public function addIdentity($uid,$genre)
    {
        $data = array(
            'uid'=> $uid,
            'genre'=> $genre,
            'created_at'=> date('Y-m-d H:i:s',time()),
        );
        IdentitysModel::create($data);
    }
}