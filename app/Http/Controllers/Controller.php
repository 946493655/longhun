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
        define('DOMAIN',getenv(strtoupper(getenv('APP_ENV')).'_DOMAIN'));
        define('PUB',getenv(strtoupper(getenv('APP_ENV')).'_PUB'));
    }
}
