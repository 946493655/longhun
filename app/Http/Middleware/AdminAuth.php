<?php
namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Closure;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Session::has('admin.uid')){
            return redirect('/lhadmin/login');
        }
        //如果用户未验证或者验证未通过时重新读取用户信息

//        if(Session::get('user.isauth') != 1 || Session::get('user.iscompany') == 0){
//            $data = ApiUsers::getUserinfo(Session::get('user.uid'));
//
//            if(!$data['code']){
//                $data   = $data['data'];
//                if(is_object($data)) $data = json_decode(json_encode( $data), true);
//
//                //加个判断，如果没有进行邮箱认证，则跳转到需要认证的页面
//                if ($data['emailck'] != 1) {
//                    return redirect('/register/success');
//                }
//                if($data['isauth'] != Session::get('user.isauth') ){
//                    Session::put('user.isauth', $data['isauth']);
//                }
//
//                if($data['iscompany'] != Session::get('user.iscompany')){
//                    Session::put('user.iscompany', $data['iscompany']);
//                }
//            }
//            unset($data);
//        }

        return $next($request);
    }
}