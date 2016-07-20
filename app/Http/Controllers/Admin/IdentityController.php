<?php
namespace App\Http\Controllers\Admin;

use App\Models\IdentitysModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class IdentityController extends BaseController
{
    /**
     * 系统后台控制器
     */

    protected $curr_url = 'identity';

    public function __construct()
    {
        parent::__construct();
        $this->model = new IdentitysModel();
    }

    public function index($uname='')
    {
        $result = [
            'datas'=> $this->query($uname),
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'uname'=> $uname,
        ];
        return view('admin.identity.index', $result);
    }

    public function create($uname)
    {
        if (!$this->getUid($uname)) {
            echo "<script>alert('无此会员！');history.go(-1);</script>";exit;
        }
        $result = [
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '添加',
            'uname'=> $uname,
        ];
        return view('admin.identity.create',$result);
    }

    public function store(Request $request,$uname)
    {
        $data = $this->getData($request,$uname);
        $data['created_at'] = date('Y-m-d H:i:s',time());
        IdentitysModel::create($data);
        return redirect('/lhadmin/user');
    }

    public function edit($id)
    {
        $result = [
            'data'=> IdentitysModel::find($id),
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '修改',
        ];
        return view('admin.identity.edit',$result);
    }

    public function update(Request $request,$uname,$id)
    {
        $data = $this->getData($request,$uname);
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        IdentitysModel::where('id',$id)->update($data);
        return redirect('/lhadmin/identity');
    }

    public function show($id)
    {
        $result = [
            'data'=> IdentitysModel::find($id),
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '详情',
        ];
        return view('admin.identity.show',$result);
    }





    public function getData(Request $request,$uname)
    {
        if (!$request->genre) {
            echo "<script>alert('身份必选！');history.go(-1);</script>";exit;
        }
        $data = [
            'uid'=> $this->getUid($uname),
            'genre'=> $request->genre,
            'qq'=> $request->qq,
            'mobile'=> $request->mobile,
            'taobao'=> $request->taobao,
            'zfb'=> $request->zfb,
            'address'=> $request->address,
        ];
        return $data;
    }

    public function query($uname)
    {
        $userModel = UserModel::where('username',$uname)->first();
        $uid = $userModel ? $userModel->id : 0;
        return IdentitysModel::where('uid',$uid)->paginate($this->limit);
    }

    public function getUid($uname)
    {
        $userModel = UserModel::where('username',$uname)->first();
        return $userModel ? $userModel->id : '';
    }
}