<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        //定义域名常量
        if (!defined('DOMAIN')) { define('DOMAIN',getenv(strtoupper(getenv('APP_ENV')).'_DOMAIN')); }
        if (!defined('PUB')) {
            define('PUB',getenv(strtoupper(getenv('APP_ENV')).'_PUB'));
        }
        //定义默认密码
        if (!defined('PWD_INIT')) { define('PWD_INIT','a12345'); }
    }
}
