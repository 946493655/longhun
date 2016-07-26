<?php
namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\FarmModel;
use Illuminate\Support\Facades\Session;

class FarmController extends BaseController
{
    /**
     * 会员后台 单子过来
     */

    public function __construct()
    {
        parent::__construct();
        $this->model = new FarmModel();
    }

    public function index($genre=0,$status=0)
    {
        $result = [
            'datas'=> $this->query($genre,$status),
            'model'=> $this->model,
            'genre'=> $genre,
            'status'=> $status,
        ];
        return view('member.farm.index', $result);
    }

    public function create()
    {
        $result = [
            'model'=> $this->model,
        ];
        return view('member.farm.create', $result);
    }

    public function store(Request $request)
    {
        $data = $this->getData($request);
        $data['created_at'] = time();
        FarmModel::create($data);
        return redirect(DOMAIN.'member/farm');
    }

    public function edit($id)
    {
        $result = [
            'data'=> FarmModel::find($id),
            'model'=> $this->model,
        ];
        return view('member.farm.edit', $result);
    }

    public function update(Request $request,$id)
    {
        $data = $this->getData($request);
        $data['updated_at'] = time();
        FarmModel::where('id',$id)->update($data);
        return redirect(DOMAIN.'member/farm');
    }

    public function destroy($id)
    {
        FarmModel::where('id',$id)->update(array('del'=>1));
        return redirect(DOMAIN.'member/farm');
    }




    public function getData(Request $request)
    {
        if (!$request->genre) {
            echo "<script>alert('单子类型必填！');history.go(-1);</script>";exit;
        }
        if (!$request->level) {
            echo "<script>alert('等级必填！');history.go(-1);</script>";exit;
        }
        if (!$request->money) {
            echo "<script>alert('价格必填！');history.go(-1);</script>";exit;
        }
        if (!$request->intro) {
            echo "<script>alert('内容必填！');history.go(-1);</script>";exit;
        }
        if (!preg_match('/^[0-9]+(.[0-9]{1,2})?$/', $request->money)) {
            echo "<script>alert('价格格式错误！');history.go(-1);</script>";exit;
        }
        return array(
            'genre'=> $request->genre,
            'uid'=> $this->uid,
            'level'=> $request->level,
            'money'=> $request->money,
            'intro'=> $request->intro,
        );
    }

    public function query($genre,$status)
    {
        $uid = Session::has('user') ? Session::get('user.uid') : 0;
        if ($genre && $status) {
            $datas = FarmModel::where('uid',$uid)
                ->where('genre',$genre)
                ->where('status',$status)
                ->orderBy('id','desc')
                ->paginate($this->limit);
        } elseif ($genre && !$status) {
            $datas = FarmModel::where('uid',$uid)
                ->where('genre',$genre)
                ->orderBy('id','desc')
                ->paginate($this->limit);
        } elseif (!$genre && $status) {
            $datas = FarmModel::where('uid',$uid)
                ->where('status',$status)
                ->orderBy('id','desc')
                ->paginate($this->limit);
        } elseif (!$genre && !$status) {
            $datas = FarmModel::where('uid',$uid)
                ->orderBy('id','desc')
                ->paginate($this->limit);
        }
        return $datas;
    }
}