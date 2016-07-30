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
        ];
        return view('admin.farm.index', $result);
    }

    public function show(){}





    public function query()
    {
        return FarmModel::paginate($this->limit);
    }
}