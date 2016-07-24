<?php
namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    /**
     * 会员入口基础控制器
     */

    protected $limit = 10;
    protected $model;
    protected $uid;

//    protected $menus = [
//        'home'=> '首页',
//        'order'=> '流程单',
//        'account'=>[
//                'identity'=> '您的身份',
//                'identity/create'=> '增加身份',
//                'info'=> '您的资料',
//                'recommend'=> '您的推荐',
//                'reception'=> '您的接待',
//                'train'=> '您的培训',
//            ],
//        'user'=> [
//                'emcee'=> '主持',
//            ],
//    ];

    public function __construct()
    {
        parent::__construct();
        if (!Session::has('user.uid')) { return redirect(DOMAIN.'login'); }
        $this->uid = Session::get('user.uid');
    }
}