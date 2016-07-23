<?php
namespace App\Http\Controllers\Login;

use App\Models\UserLogModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request as AjaxRequest;
use Illuminate\Support\Facades\Input;

class LoginController extends BaseController
{
    /**
     * 会员登录
     */

    public function login()
    {
        $result = [
            'domain'=> DOMAIN,
            'pub'=> PUB,
        ];
        return view('login.login',$result);
    }

    /**
     * 会员登录
     */
    public function dologin(Request $request)
    {
        if (!$request->name || !$request->pwd) {
            echo "<script>alert('昵称或密码必填！');history.go(-1);</script>";exit;
        }
        if (mb_strlen($request->name)<2 || mb_strlen($request->name)>6) {
            echo "<script>alert('昵称在2到6位之间！');history.go(-1);</script>";exit;
        }
        if (mb_strlen($request->pwd)<6 || mb_strlen($request->pwd)>20) {
            echo "<script>alert('密码在6到20位之间！');history.go(-1);</script>";exit;
        }
        if (!preg_match("/[A-Za-z]*/",$request->pwd)|| !preg_match("/[0-9]*/",$request->pwd)) {
            echo "<script>alert('密码必须数字、字母组合！');history.go(-1);</script>";exit;
        }
        //验证会员、密码
        $userModel = UserModel::where('username',$request->name)->first();
        if (!$userModel) {
            echo "<script>alert('无此会员！！');history.go(-1);</script>";exit;
        }
        if (!(Hash::check($request->pwd, $userModel->pwd))) {
            echo "<script>alert('密码不对！');history.go(-1);</script>";exit;
        }

        //更新上次登录时间
        UserModel::where('id',$userModel->id)->update(array('lastLogin'=>time()));

        //登录成功，写入session
        $sessionInfo = [
            'uid'=> $userModel->id,
            'username'=> $userModel->username,
            'realname'=> $userModel->realname,
            'loginTime'=> time(),
        ];
        Session::put('user', $sessionInfo);

        //用户日志记录
        $userlog = [
            'uid'=> $userModel->id,
            'loginTime'=> time(),
        ];
        UserLogModel::create($userlog);

//        echo "<script>alert('登录成功！');window.location.href='/member';";
        return redirect(DOMAIN.'member');
    }

    /**
     * 重复会员昵称测试
     */
    public function hasUser()
    {
        if (AjaxRequest::ajax()) {
            $data = Input::all();
            $userModel = UserModel::where('username',$data['name'])->first();
            if ($userModel) {
                echo json_encode(array('code'=>'-2', 'message' =>'已有此昵称，请换个昵称！'));exit;
            }
            echo json_encode(array('code'=>'0', 'message' =>'没有此昵称，可以使用!'));exit;
        }
        echo json_encode(array('code'=>'-1', 'message' =>'非法操作!'));exit;
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        //更新用户日志
        $user = Session::has('user') ? Session::get('user') : '';
        $userlog = UserLogModel::where(array('uid'=>$user['uid'], 'loginTime'=>$user['loginTime']))->first();
        if ($userlog) {
            UserLogModel::where('id',$userlog->id)->update(array('logoutTime'=>time()));
        }
        //去除session
        Session::forget('user');
        return redirect(DOMAIN);
    }
}