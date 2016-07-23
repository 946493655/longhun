<?php
namespace App\Http\Controllers\Admin;

use App\Models\AdminModel;
use App\Models\AdminLogModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends BaseController
{
    /**
     * 系统后台登录控制器
     */

    public function login()
    {
        $result = [
            'domain'=> DOMAIN,
            'pub'=> PUB,
        ];
        return view('admin.login', $result);
    }

    /**
     * 后台登录
     */
    public function dologin(Request $request)
    {
        //一些验证
        if (!$request->name || !$request->pwd) {
            echo "<script>alert('昵称、密码必填！');history.go(-1);</script>";exit;
        }
        if (mb_strlen($request->name)<2 || mb_strlen($request->name)>6) {
            echo "<script>alert('注意昵称2-6位！');history.go(-1);</script>";exit;
        }
        if (!preg_match('/[a-zA-Z]/',$request->pwd) || !preg_match('/\d+/',$request->pwd)) {
            echo "<script>alert('密码中必须要有数字和字母！');history.go(-1);</script>";exit;
        }
        if (preg_match("/[\x7f-\xff]/", $request->pwd)) {
            echo "<script>alert('密码中不能有中文！');history.go(-1);</script>";exit;
        }
        if (mb_strlen($request->pwd)<6 || mb_strlen($request->pwd)>20) {
            echo "<script>alert('注意密码6-20位！');history.go(-1);</script>";exit;
        }
        //查看有无此会员
        $adminModel = AdminModel::where('username',$request->name)->first();
        if (!$adminModel) {
            echo "<script>alert('无此会员！');history.go(-1);</script>";exit;
        }
        if (!(Hash::check($request->pwd, $adminModel->pwd))) {
            echo "<script>alert('密码不对！');history.go(-1);</script>";exit;
        }

        //更新上次登录时间
        AdminModel::where('id',$adminModel->id)->update(array('lastLogin'=> time()));

        //登录成功，写入session
        $sessionInfo = [
            'uid'=> $adminModel->id,
            'username'=> $adminModel->username,
            'realname'=> $adminModel->realname,
            'genre'=> $adminModel->genreName(),
            'loginTime'=> time(),
            'lastLogin'=> $adminModel->lastLogin,
        ];
        Session::put('admin', $sessionInfo);

        //管理员日志记录
        $adminlog = [
            'admin_id'=> $adminModel->id,
            'loginTime'=> time(),
        ];
        AdminLogModel::create($adminlog);

//        echo "<script>alert('登录成功！');window.location.href='".DOMAIN."lhadmin';</script>"; exit;
        return redirect(DOMAIN.'lhadmin');
    }

    /**
     * 后台退出
     */
    public function dologout()
    {
        //更新管理员日志
        $admin = Session::has('admin') ? Session::get('admin') : '';
        $adminlog = AdminLogModel::where(array('admin_id'=>$admin['uid'], 'loginTime'=>$admin['loginTime']))->first();
        if ($adminlog) {
            AdminLogModel::where('id',$adminlog->id)->update(array('logoutTime'=>time()));
        }
        //去除session
        Session::forget('admin');
        return redirect(DOMAIN.'lhadmin');
    }
}