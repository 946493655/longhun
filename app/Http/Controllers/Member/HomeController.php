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
        $datas = FarmModel::where('uid',$this->uid)
            ->where('created_at','>',time()-3600*24)
            ->paginate($this->limit/2);
        $allFarms = FarmModel::where('uid',$this->uid)
                                ->where('genre',1)
                                ->get();
        $successFarms = FarmModel::where('uid',$this->uid)
                                ->where('genre',1)
                                ->where('status',8)
//                                ->where('created_at','>',time()-3600*24)
//                                ->orderBy('id','desc')
                                ->get();
        $datas->allFarms = count($allFarms);
        $datas->successFarms = count($successFarms);
        return $datas;
    }
}