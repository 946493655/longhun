<?php
namespace App\Models;

class FarmModel extends BaseModel
{
    /**
     * 自定义单子表
     */

    protected $table = 'farms';

    protected $fillable = [
        'id','genre','uid','level','money','intro','status','del','created_at','updated_at',
    ];

    protected $genres = [
        1=>'淘宝单','天猫单','一号店','京东单','蘑菇街','美丽说','浏览单','关注单','扫码单','注册单',
    ];

    protected $levels = [
        1=>'白号','1星','2星','3星','4星','5星',
        '1金钻','2金钻','3金钻','4金钻','5金钻',
        '1蓝色皇冠','2蓝色皇冠','3蓝色皇冠','4蓝色皇冠','5蓝色皇冠',
        '1紫金皇冠','2紫金皇冠','3紫金皇冠','4紫金皇冠','5紫金皇冠',
    ];

    protected $statuss = [
        1=>'未下单','下单','付款','发货','收货','评价','追评','完成',
    ];

    public function user()
    {
        return $this->uid ? UserModel::find($this->uid) : '';
    }
}