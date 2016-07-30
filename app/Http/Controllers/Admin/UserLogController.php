<?php
namespace App\Http\Controllers\Admin;

use App\Models\UserLogModel;

class UserLogController extends BaseController
{
    /**
     * 管理后台 会员日志
     */

    public function index()
    {
        $result = [
            'datas'=> $this->query(),
            'prefix_url'=> DOMAIN.'lhadmin/userlog',
        ];
        return view('admin.userlog.index', $result);
    }

    public function query()
    {
        $datas = UserLogModel::orderBy('id','desc')->paginate($this->limit);
        $datas->limit = $this->limit;
        return $datas;
    }
}