<?php
namespace App\Http\Controllers\Member;

use App\Models\IdentitysModel;

class IdentityController extends BaseController
{
    /**
     * 会员管理
     */

    public function index()
    {
        return view('member.identity.index', array(
//        return view('member.main', array(
                'data'=> $this->query(),
            ));
    }




    public function query()
    {
        return IdentitysModel::get();
    }
}