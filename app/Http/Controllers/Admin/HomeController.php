<?php
namespace App\Http\Controllers\Admin;

use App\Models\FarmModel;
use App\Models\UserLogModel;
use App\Models\UserModel;

class HomeController extends BaseController
{
    /**
     * 系统后台控制器
     */

    public function index()
    {
        $result = [
            'users'=> UserModel::all(),
            'farmsAll'=> FarmModel::all(),
            'userlogs'=> $this->userlogs(),
            'farms'=> $this->farms(),
            'crumb'=> $this->crumbs,
            'curr_url'=> 'home',
        ];
        return view('admin.home.index', $result);
    }

    public function farms()
    {
        return FarmModel::where('created_at','>',time()-3600*24)
            ->orderBy('id','desc')
            ->paginate($this->limit/2);
    }

    public function userlogs()
    {
        return UserLogModel::where('loginTime','>',time()-3600*24)->paginate($this->limit/2);
    }
}