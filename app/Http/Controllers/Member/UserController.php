<?php
namespace App\Http\Controllers\Member;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends BaseController
{
    /**
     * 会员管理 会员资料
     */

    public function index()
    {
        $uid = Session::has('user') ? Session::get('user.uid') : 0;
        $userModel = UserModel::find($uid);
        $result = [
            'data'=> (isset($userModel)&&$userModel) ? $userModel : '',
        ];
        return view('member.user.index', $result);
    }

    public function edit($id)
    {
        $result = [
            'data'=> UserModel::find($id),
        ];
        return view('member.user.edit', $result);
    }

    public function update(Request $request,$id)
    {
        $data = array(
            'zfb'=> $request->zfb,
            'mobile'=> $request->mobile,
            'update_at'=> time(),
        );
        UserModel::where('id',$id)->update($data);
        return redirect(DOMAIN.'member/user');
    }
}