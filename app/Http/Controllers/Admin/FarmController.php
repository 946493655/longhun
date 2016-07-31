<?php
namespace App\Http\Controllers\Admin;

use App\Models\FarmModel;

class FarmController extends BaseController
{
    /**
     * 系统后台 自定义单子
     */

    public function index()
    {
        $result = [
            'datas'=> $this->query(),
            'prefix_url'=> DOMAIN.'lhadmin/farm',
        ];
        return view('admin.farm.index', $result);
    }

    public function show(){}





    public function query()
    {
        $datas = FarmModel::paginate($this->limit);
        $datas->limit = $this->limit;
        return $datas;
    }
}