<?php
namespace App\Models;

class FarmDemandModel extends BaseModel
{
    /**
     * 自定义单子用户账号表
     */

    protected $table = 'farms_demand';

    protected $fillable = [
        'id','uid','taobao','zfb','created_at','updated_at',
    ];

    public function getName()
    {
        return '拍单旺旺：'.$this->taobao.' <--> 收款支付宝：'.$this->zfb;
    }
}