<?php
namespace App\Http\Controllers\Member;

use App\Models\IdentitysModel;

class HomeController extends BaseController
{
    /**
     * 会员管理
     */

    public function index()
    {
        return view('member.home.index');
    }
}