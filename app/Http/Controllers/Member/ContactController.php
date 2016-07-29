<?php
namespace App\Http\Controllers\Member;

use App\Models\IdentitysModel;
use App\Models\UserModel;

class ContactController extends BaseController
{
    /**
     * 联系人信息控制器
     */

    public function __construct()
    {
        parent::__construct();
        $this->model = new IdentitysModel();
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

    public function query()
    {
        $userModel = UserModel::find($this->uid);
        if ($userModel) {
            $ids = array($userModel->recommend_id,$userModel->recept_id,$userModel->train_id);
            $datas = UserModel::whereIn('id',$ids)->get();
        }
        return isset($datas) ? $datas : [];
    }
}