<?php
namespace App\Http\Controllers\Admin;

class HomeController extends BaseController
{
    /**
     * 系统后台控制器
     */

    public function index()
    {
        $result = [
            'crumb'=> $this->crumbs,
            'curr_url'=> 'home',
        ];
        return view('admin.home.index', $result);
    }
}