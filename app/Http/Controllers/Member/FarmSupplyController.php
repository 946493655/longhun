<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\FarmSupplyModel;
use Illuminate\Support\Facades\Session;

class FarmSupplyController extends BaseController
{
    /**
     * 会员后台 单子过来
     */

    public function __construct()
    {
        parent::__construct();
        $this->model = new FarmSupplyModel();
    }

    public function index()
    {
        $result = [
            'datas'=> $this->query(),
            'prefix_url'=> DOMAIN.'member/farmSupply',
        ];
        return view('member.farmSupply.index', $result);
    }

    public function create()
    {
        $result = [
            'model'=> $this->model,
        ];
        return view('member.farmSupply.create', $result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['created_at'] = time();
        FarmSupplyModel::create($data);
        return redirect(DOMAIN.'member/farmSupply');
    }

    public function edit($id)
    {
        $result = [
            'data'=> FarmSupplyModel::find($id),
            'model'=> $this->model,
        ];
        return view('member.farmSupply.edit', $result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = time();
        FarmSupplyModel::where('id',$id)->update($data);
        return redirect(DOMAIN.'member/farmSupply');
    }




    public function getData(Request $request)
    {
        if (!$request->is_number || !$request->is_account || !$request->is_name) {
            echo "<script>alert('IS信息必填！');history.go(-1);</script>";exit;
        }
        $uid = Session::has('user') ? Session::get('user.uid') : 0;
        return array(
            'uid'=> $uid,
            'is_number'=> $request->is_number,
            'is_account'=> $request->is_account,
            'is_name'=> $request->is_name,
        );
    }

    public function query()
    {
        $uid = Session::has('user') ? Session::get('user.uid') : 0;
        $datas = FarmSupplyModel::where('uid',$uid)
            ->orderBy('id','desc')
            ->paginate($this->limit);
        if (isset($datas) && $datas) { $datas->limit = $this->limit; }
        return $datas;
    }

}