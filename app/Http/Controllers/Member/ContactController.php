<?php
namespace App\Http\Controllers\Member;

use App\Models\FarmSupplyModel;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    /**
     * 联系人信息控制器
     */

    public function __construct()
    {
        parent::__construct();
        $this->model = new FarmSupplyModel();
    }

    public function index()
    {
        $result = [
            'datas'=>$this->query(),
            'model'=> $this->model,
        ];
//        dd($this->query());
        return view('member.contact.index', $result);
    }

    public function create()
    {
        return view('member.contact.create');
    }

    public function store(Request $request)
    {
        return redirect(DOMAIN.'member/contact');
    }

    public function edit($id){}

    public function update(Request $request,$id){}





    public function query()
    {
        return FarmSupplyModel::where(array('uid'=>$this->uid))
                        ->whereIn('genre',[2,3,4])
                        ->get();
    }
}