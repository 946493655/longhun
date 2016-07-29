<?php
namespace App\Models;

class FarmSupplyModel extends BaseModel
{
    /**
     * 自定义单子主持表
     */

    protected $table = 'farms_supply';

    protected $fillable = [
        'id','uid','is_number','is_account','is_name','created_at','updated_at',
    ];

    public function getName()
    {
        return $this->is_name ? '丿龍魂丶'.$this->is_name.'主持' : '';
    }
}