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

    public function __construct()
    {
        parent::__construct();
        $this->model = new FarmVestModel();
    }

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

    public function create()
    {
        $result = [
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '添加',
        ];
        return view('admin.farmvest.create', $result);
    }

    public function store(Request $request)
    {
        //马甲去重
        $farmVest = FarmVestModel::where(array(
                'prefix'=> $request->prefix,
                'tuan'=> $request->tuan,
                'suffix'=> $request->suffix,
            ))->first();
        if ($farmVest) {
            echo "<script>alert('已存在此马甲，不能重复添加！');history.go(-1);</script>";exit;
        }
        $data = $this->getData($request);
        $data['created_at'] = time();
        FarmVestModel::create($data);
        return redirect(DOMAIN.'lhadmin/farmvest');
    }

    public function edit($id)
    {
        $result = [
            'data'=> FarmVestModel::find($id),
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> $this->curr_url,
            'curr_detail'=> '编辑',
        ];
        return view('admin.farmvest.edit', $result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = time();
        FarmVestModel::where('id',$id)->update($data);
        return redirect(DOMAIN.'lhadmin/farmvest');
    }





    public function getData(Request $request)
    {
        if (!$request->prefix || !$request->tuan || !$request->suffix) {
            echo "<script>alert('马甲信息必填！');history.go(-1);</script>";exit;
        }
        return array(
            'prefix'=> $request->prefix,
            'tuan'=> $request->tuan,
            'suffix'=> $request->suffix,
            'remark'=> $request->remark,
        );
    }

    public function query()
    {
        $datas = FarmVestModel::orderBy('id','desc')->paginate($this->limit);
        $datas->limit = $this->limit;
        return $datas;
    }
}