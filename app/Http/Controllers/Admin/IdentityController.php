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

    public function create($uid)
    {
        if (!$this->getUser($uid)) {
            echo "<script>alert('无此会员！');history.go(-1);</script>";exit;
        }
        $result = [
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '添加',
            'uid'=> $uid,
        ];
        return view('admin.identity.create',$result);
    }

    public function store(Request $request,$uname)
    {
        //限制雷同身份
        if (IdentitysModel::where(['uid'=>$request->uid, 'genre'=>$request->genre])->first()) {
            echo "<script>alert('已有类似记录！');history.go(-1);</script>";exit;
        }
        //身份数量上限
        $identitys = IdentitysModel::where('uid',$request->uid)->get();

        if (count($identitys)>=count($this->model['genres'])) {
            echo "<script>alert('此会员身份已全！');history.go(-1);</script>";exit;
        }
        $data = $this->getData($request,$uname);
        $data['created_at'] = date('Y-m-d H:i:s',time());
        IdentitysModel::create($data);
        return redirect(DOMAIN.'lhadmin/user');
    }

    public function edit($uid,$id)
    {
        $result = [
            'data'=> IdentitysModel::find($id),
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '修改',
            'uid'=> $uid,
        ];
        return view('admin.identity.edit',$result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        IdentitysModel::where('id',$id)->update($data);
        return redirect(DOMAIN.'lhadmin/identity');
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





    public function getData(Request $request)
    {
        if (!$request->genre) {
            echo "<script>alert('身份必选！');history.go(-1);</script>";exit;
        }
        $data = [
            'uid'=> $request->uid,
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
        $userModel = UserModel::where('username','like','%'.$uname.'%')->get();
        $uid = $userModel ? $userModel->id : 0;
        return IdentitysModel::where('uid',$uid)->paginate($this->limit);
    }

    public function getUser($uid)
    {
        $userModel = UserModel::find($uid);
        return $userModel ? $userModel->id : '';
    }
}