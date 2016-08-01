<?php
namespace App\Models;

class FarmModel extends BaseModel
{
    /**
     * 自定义单子表
     */

    protected $table = 'farms';

    protected $fillable = [
        'id','genre','uid','level','money','intro','remarks','demand_id','supply_id','supply_shop','supply_price','status','del','created_at','updated_at',
    ];

    protected $genres = [
        1=>'淘宝单',/*'天猫单','一号店','京东单','蘑菇街','美丽说','浏览单','关注单','扫码单','注册单',*/
    ];

    protected $statuss = [
        1=>'未下单','下单','付款','发货','收货','评价','追评','完成',
    ];

    /**
     * 会员资料
     */
    public function user()
    {
        return $this->uid ? UserModel::find($this->uid) : '';
    }

    /**
     * 发布人昵称
     */
    public function getUserName()
    {
        return $this->user() ? $this->user()->username : '';
    }

    /**
     * 单子类型
     */
    public function genreName()
    {
       return array_key_exists($this->genre,$this->genres) ? $this->genres[$this->genre] : '';
    }


    /**
     * 状态名称
     */
    public function statusName()
    {
       return array_key_exists($this->status,$this->statuss) ? $this->statuss[$this->status] : '';
    }

    public function money()
    {
        return $this->money ? $this->money.'元' : '';
    }

    public function price()
    {
        return $this->supply_price ? $this->supply_price.'元' : '';
    }

    public function remarks()
    {
        return $this->remarks ? $this->remarks : '未填写';
    }

    /**
     * 该会员所有主持
     */
    public function supplys($uid)
    {
        $farmSupplys = FarmSupplyModel::where('uid',$uid)->get();
        return count($farmSupplys) ? $farmSupplys : [];
    }

    /**
     * 主持的IS账号
     */
    public function supply()
    {
        $supply_id = $this->supply_id ? $this->supply_id : 0;
        $farmSupplyModel = FarmSupplyModel::find($supply_id);
        return $farmSupplyModel ? $farmSupplyModel : '';
    }

    /**
     * 主持的IS昵称（有马甲）
     */
    public function supplyIsName()
    {
        return $this->supply() ? $this->supply()->getName() : '';
    }

    /**
     * 主持IS昵称（无马甲）
     */
    public function supplyIsNameNoVest()
    {
        return $this->supply() ? $this->supply()->is_name : '';
    }

    /**
     * 该会员所有账号
     */
    public function demands($uid)
    {
        $farmDemands = FarmDemandModel::where('uid',$uid)->get();
        return count($farmDemands) ? $farmDemands : [];
    }

    /**
     * 会员的拍单、回款账号
     */
    public function demand()
    {
        $demand_id = $this->demand_id ? $this->demand_id : 0;
        $farmDemandModel = FarmDemandModel::find($demand_id);
        return $farmDemandModel ? $farmDemandModel : '';
    }

    /**
     * 当前页面单子的佣金总和
     */
    public function totalMoney($arrs)
    {
        $totalMoney = 0;
        if (count($arrs)) {
            foreach ($arrs as $arr) { $totalMoney += $arr->money; }
        }
        return $totalMoney.'元';
    }

    /**
     * 淘宝单轮数计算 淘宝单genre==1
     */
    public function taobaoTurns($uid)
    {
        return FarmModel::where(array('uid'=>$uid, 'genre'=>1, 'isturn'=>1))->get();
    }

    public function taobaoTurn($uid)
    {
        return count($this->taobaoTurns($uid))/300 .'轮';
    }

    /**
     * 未计算轮数的淘宝单 淘宝单genre==1
     */
    public function tbTurns($uid)
    {
        return FarmModel::where(array('uid'=>$uid, 'genre'=>1, 'isturn'=>0))->get();
    }

    /**
     * 本轮淘宝单数量
     */
    public function tbTurn($uid)
    {
        return count($this->tbTurns($uid)).'单';
    }

    /**
     * 本轮淘宝单佣金总额
     */
    public function tbTurnMoney($uid)
    {
        $tbTurnMoney = 0;
        $tbTurns = $this->tbTurns($uid);
        if (count($tbTurns)) {
            foreach ($tbTurns as $tbTurn) {
                $tbTurnMoney += $tbTurn->money;
            }
        }
        return $tbTurnMoney.'元';
    }
}