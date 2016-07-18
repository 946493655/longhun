<?php
namespace App\Http\Controllers\Member;

class IdentityController extends BaseController
{
    /**
     * 会员管理
     */

    public function index()
    {
        return view('member.identity.index');
    }
}