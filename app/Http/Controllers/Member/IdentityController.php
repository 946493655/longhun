<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\IdentitysModel;

class IdentityController extends BaseController
{
    /**
     * 会员管理 身份列表
     */

    public function __construct()
    {
        parent::__construct();
        $this->model = new IdentitysModel();
    }

    public function index()
    {
        $result = [
            'datas'=> $this->query(),
        ];
        return view('member.identity.index', $result);
    }

    public function create()
    {
        $result = [
            'model'=> $this->model,
        ];
        return view('member.identity.create', $result);
    }

    public function store(Request $request)
    {
        //一些限制：身份数量、同名限制
        $identitys = IdentitysModel::where('uid',$this->uid)->get();
        if (count($identitys)==count($this->model['genres'])) {
            echo "<script>alert('身份数量已经上限！');history.go(-1);</script>";exit;
        }
        $identityModel = IdentitysModel::where(array('uid'=>$this->uid, 'genre'=>$request->genre))->first();
        if ($identityModel) {
            echo "<script>alert('已有相同的身份，不能重复添加！');history.go(-1);</script>";exit;
        }
        $data = $this->getData($request);
        $data['created_at'] = time();
        IdentitysModel::create($data);
        return redirect(DOMAIN.'member/identity');
    }

    public function edit($id)
    {
        $result = [
            'data'=> IdentitysModel::find($id),
            'model'=> $this->model,
        ];
        return view('member.identity.edit', $result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = time();
        IdentitysModel::where('id',$id)->update($data);
        return redirect(DOMAIN.'member/identity');
    }




    public function getData(Request $request)
    {
        if (!$request->genre || !$request->qq || !$request->mobile || !$request->taobao || !$request->zfb || !$request->address) {
            echo "<script>alert('信息填写不完整！');history.go(-1);</script>";exit;
        }
        return array(
            'uid'=> $this->uid,
            'genre'=> $request->genre,
            'qq'=> $request->qq,
            'mobile'=> $request->mobile,
            'taobao'=> $request->taobao,
            'zfb'=> $request->zfb,
            'address'=> $request->address,
        );
    }

    public function query()
    {
        return IdentitysModel::paginate($this->limit);
    }
}