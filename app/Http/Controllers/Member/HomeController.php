<?php
namespace App\Http\Controllers\Member;

use App\Models\FarmModel;
use App\Models\UserModel;

class HomeController extends BaseController
{
    /**
     * 会员管理
     */

    public function index()
    {
        $result = [
            'user'=> UserModel::find($this->uid),
            'farms'=> $this->farms(),
        ];
        return view('member.home.index', $result);
    }

    /**
     * 自定义单子 当天的
     */
    public function farms()
    {
        $datas = FarmModel::where('uid',$this->uid)->get();
        $successFarms = FarmModel::where('uid',$this->uid)
                                ->where('genre',1)
                                ->where('created_at','>',time()-3600*24)
                                ->where('id','desc')
                                ->get();
        $datas->successFarms = count($successFarms);
        return $datas;
    }
}