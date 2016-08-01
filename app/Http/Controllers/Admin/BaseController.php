<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * 后台基础控制器
     */

    protected $limit = 10;      //每页显示记录数
    protected $model;

    protected $crumbs = [
        'home'=> '首页',
        'admin'=> '管理员',
        'user'=> '会员',
        'identity'=> '会员身份',
        'adminlog'=> '管理员日志',
        'userlog'=> '会员日志',
        'farm'=> '自定义单子',
        'farmvest'=> '会员日志',
    ];

    public function __construct()
    {
        parent::__construct();
    }
}