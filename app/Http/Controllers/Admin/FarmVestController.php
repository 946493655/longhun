<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FarmVestModel;

class FarmVestController extends BaseController
{
    /**
     * 管理后台 管理员日志
     */

    protected $curr_url = 'farmvest';

    public function index()
    {
        $result = [
            'datas'=> $this->query(),
            'prefix_url'=> DOMAIN.'lhadmin/farmvest',
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
        ];
        return view('admin.farmvest.index', $result);
    }

    public function create(){}

    public function store(Request $request){}

    public function edit($id){}

    public function update(Request $request,$id){}





    public function query()
    {
        $datas = FarmVestModel::orderBy('id','desc')->paginate($this->limit);
        $datas->limit = $this->limit;
        return $datas;
    }
}