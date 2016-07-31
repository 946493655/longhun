<?php
namespace App\Models;

class FarmDemandModel extends BaseModel
{
    /**
     * 自定义单子用户账号表
     */

    protected $table = 'farms_demand';

    protected $fillable = [
        'id','uid','taobao','tb_level','zfb','created_at','updated_at',
    ];

    //白号，1星，2星，3星，4星，5星，金钻，2金钻，3金钻，4金钻，5金钻，1蓝色皇冠，2蓝色皇冠，3蓝色皇冠，4蓝色皇冠，5蓝色皇冠，1紫金皇冠，2紫金皇冠，3紫金皇冠，4紫金皇冠，5紫金皇冠
    protected $levels = [
        1=>'白号','1星','2星','3星','4星','5星',
        '1金钻','2金钻','3金钻','4金钻','5金钻',
        '1蓝色皇冠','2蓝色皇冠','3蓝色皇冠','4蓝色皇冠','5蓝色皇冠',
        '1紫金皇冠','2紫金皇冠','3紫金皇冠','4紫金皇冠','5紫金皇冠',
    ];

    /**
     * 级别名称
     */
    public function levelName()
    {
        return array_key_exists($this->tb_level,$this->levels) ? $this->levels[$this->tb_level] : '';
    }

    public function getName()
    {
        return '拍单旺旺：'.$this->taobao.' <--> 收款支付宝：'.$this->zfb.' <--> 淘宝等级：'.$this->levelName();
    }
}