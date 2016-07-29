<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\FarmDemandModel;
use Illuminate\Support\Facades\Session;

class FarmDemandController extends BaseController
{
    /**
     * 会员后台 单子过来
     */

    public function __construct()
    {
        parent::__construct();
        $this->model = new FarmDemandModel();
    }

    public function index()
    {
        $result = [
            'datas'=> $this->query(),
            'prefix_url'=> DOMAIN.'member/farmDemand',
        ];
        return view('member.farmDemand.index', $result);
    }

    public function create()
    {
        $result = [
            'model'=> $this->model,
        ];
        return view('member.farmDemand.create', $result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['created_at'] = time();
        FarmDemandModel::create($data);
        return redirect(DOMAIN.'member/farmDemand');
    }

    public function edit($id)
    {
        $result = [
            'data'=> FarmDemandModel::find($id),
            'model'=> $this->model,
        ];
        return view('member.farmDemand.edit', $result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = time();
        FarmDemandModel::where('id',$id)->update($data);
        return redirect(DOMAIN.'member/farmDemand');
    }




    public function getData(Request $request)
    {
        if (!$request->taobao || !$request->zfb) {
            echo "<script>alert('IS信息必填！');history.go(-1);</script>";exit;
        }
        $uid = Session::has('user') ? Session::get('user.uid') : 0;
        return array(
            'uid'=> $uid,
            'taobao'=> $request->taobao,
            'zfb'=> $request->zfb,
        );
    }

    public function query()
    {
        $uid = Session::has('user') ? Session::get('user.uid') : 0;
        $datas = FarmDemandModel::where('uid',$uid)
            ->orderBy('id','desc')
            ->paginate($this->limit);
        if (isset($datas) && $datas) { $datas->limit = $this->limit; }
        return $datas;
    }

}