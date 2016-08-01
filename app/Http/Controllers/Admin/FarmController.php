<?php
namespace App\Http\Controllers\Admin;

use App\Models\FarmModel;
use App\Models\FarmSupplyModel;
use App\Models\UserModel;

class FarmController extends BaseController
{
    /**
     * 系统后台 自定义单子
     */

    protected $curr_url = 'farm';

    public function index($uname='')
    {
        $result = [
            'datas'=> $this->query($uname),
            'prefix_url'=> DOMAIN.'lhadmin/farm',
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'uname'=> $uname,
        ];
        return view('admin.farm.index', $result);
    }

    public function show($id)
    {
        $result = [
            'data'=> FarmModel::find($id),
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '详情',
        ];
        return view('admin.farm.show', $result);
    }





    public function query($uname)
    {
        if (!$uname) {
            $datas = FarmModel::orderBy('id','desc')->paginate($this->limit);
            $datas->all = count(FarmModel::all());
        } else {
            $userModel = UserModel::where('username','like','%'.$uname.'%')->first();
            $uid = count($userModel) ? $userModel->id : 0;
            $datas = FarmModel::where('uid',$uid)
                ->orderBy('id','desc')
                ->paginate($this->limit);
            $datas->all = count(FarmModel::where('uid',$uid)->get());
        }
//        $datas = FarmModel::orderBy('id','desc')->paginate($this->limit);
        $datas->limit = $this->limit;
        return $datas;
    }
}