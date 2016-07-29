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
        $this->isturn();        //满300则更新
        $result = [
            'datas'=> $this->query($genre,$status),
            'model'=> $this->model,
            'prefix_url'=> DOMAIN.'member/farm',
            'genre'=> $genre,
            'status'=> $status,
        ];
        return view('member.farm.index', $result);
    }

    public function create()
    {
        $result = [
            'supplys'=> $this->model->supplys($this->uid),
            'demands'=> $this->model->demands($this->uid),
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
        $this->tolimit($id);
        $result = [
            'data'=> FarmModel::find($id),
            'supplys'=> $this->model->supplys($this->uid),
            'demands'=> $this->model->demands($this->uid),
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

    public function show($id)
    {
        $result = [
            'data'=> FarmModel::find($id),
            'supplys'=> $this->model->supplys($this->uid),
            'demands'=> $this->model->demands($this->uid),
            'model'=> $this->model,
        ];
        return view('member.farm.show', $result);
    }

    public function destroy($id)
    {
        $this->tolimit($id);
        FarmModel::where('id',$id)->update(array('del'=>1));
        return redirect(DOMAIN.'member/farm');
    }

    public function status($id)
    {
        $result = [
            'data'=> FarmModel::find($id),
            'model'=> $this->model,
        ];
        return view('member.farm.status', $result);
    }

    public function setStatus($id,$status)
    {
        FarmModel::where('id',$id)->update(array('status'=> $status));
        return redirect(DOMAIN.'member/farm/status/'.$id);
    }




    public function getData(Request $request)
    {
        if (!$request->genre || !$request->level) {
            echo "<script>alert('单子类型、等级必选！');history.go(-1);</script>";exit;
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
        if (!$request->demand_id || !$request->supply_id) {
            echo "<script>alert('单子类型、等级必选！');history.go(-1);</script>";exit;
        }
        return array(
            'genre'=> $request->genre,
            'uid'=> $this->uid,
            'level'=> $request->level,
            'money'=> $request->money,
            'intro'=> $request->intro,
            'demand_id'=> $request->demand_id,
            'supply_id'=> $request->supply_id,
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
        if (isset($datas) && $datas) {
            $datas->limit = $this->limit;
            $datas->totalMoney = $this->model->totalMoney($datas);
            $datas->taobaoTurn = $this->model->taobaoTurn($this->uid);
            $datas->tbTurn = $this->model->tbTurn($this->uid);
            $datas->tbTurnMoney = $this->model->tbTurnMoney($this->uid);
        }
        return $datas;
    }

    /**
     * 修改、删除的限制
     */
    public function tolimit($id)
    {
        $data = FarmModel::where('id',$id)->first();
        if ($data->status>1) {
            echo "<script>alert('此记录已走流程，不能修改或删除！');history.go(-1);</script>";exit;
        }
    }

    /**
     * 淘宝单标识更新
     */
    public function isturn()
    {
        $datas = FarmModel::where(array('uid'=>$this->uid, 'genre'=>1, 'isturn'=>0))->get();
        if (count($datas)==300) {
            FarmModel::where(array('uid'=>$this->uid, 'genre'=>1, 'isturn'=>0))->update(array('isturn'=>1));
        }
    }
}