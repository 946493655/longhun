<?php
namespace App\Http\Controllers\Admin;

use App\Models\AdminModel;

use Illuminate\Http\Request;

class AdminController extends BaseController
{
    /**
     * 系统后台控制器
     */

    public function __construct()
    {
        parent::__construct();
        $this->model = new AdminModel();
    }

    public function index($genre=0)
    {
        $result = [
            'datas'=> $this->query($genre),
            'crumb'=> $this->crumbs,
            'curr_url'=> 'admin',
        ];
        return view('admin.admin.index', $result);
    }

    public function create()
    {
        $result = [
            'model'=> $this->model,
            'crumb'=> $this->crumbs,
            'curr_url'=> 'admin',
            'curr_detail'=> '添加',
        ];
        return view('admin.admin.create',$result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        //用户表
        //身份表
        //管理员
        return redirect('/lhadmin/admin');
    }





    public function getData(Request $request)
    {
        if (!$request->name || !$request->realname || !$request->genre) {
            echo "<script>alert('昵称、真实姓名、类型必填！');</script>";exit;
        }
        if ($request->name<2 || $request->name>6) {
            echo "<script>alert('昵称必须2-6个字符！');</script>";exit;
        }
        if ($request->realname<2) {
            echo "<script>alert('真实姓名至少2个字符！');</script>";exit;
        }
        $data = [
            'user'=> [],
            'identity'=> [],
            'admin'=> [],
        ];
        return $data;
    }

    public function query($genre)
    {
        if ($genre) {
            $datas = AdminModel::where('genre',$genre)->paginate($this->limit);
        } else {
            $datas = AdminModel::paginate($this->limit);
        }
        return $datas;
    }
}