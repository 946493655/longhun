<?php
namespace App\Http\Controllers\Admin;

use App\Models\AdminLogModel;

class AdminLogController extends BaseController
{
    /**
     * 管理后台 管理员日志
     */

    protected $curr_url = 'adminlog';

    public function index()
    {
        $result = [
            'datas'=> $this->query(),
            'prefix_url'=> DOMAIN.'lhadmin/adminlog',
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
        ];
        return view('admin.adminlog.index', $result);
    }

    public function query()
    {
        $datas = AdminLogModel::orderBy('id','desc')->paginate($this->limit);
        $datas->limit = $this->limit;
        return $datas;
    }
}