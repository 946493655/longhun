<?php
namespace App\Http\Controllers\Admin;

use App\Models\UserLogModel;

class UserLogController extends BaseController
{
    /**
     * 管理后台 会员日志
     */

    protected $curr_url = 'userlog';

    public function index()
    {
        $result = [
            'datas'=> $this->query(),
            'prefix_url'=> DOMAIN.'lhadmin/userlog',
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
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