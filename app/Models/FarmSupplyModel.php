<?php
namespace App\Models;

class FarmSupplyModel extends BaseModel
{
    /**
     * 自定义单子主持表
     */

    protected $table = 'farms_supply';

    protected $fillable = [
        'id','uid','genre','is_number','is_account','is_name','created_at','updated_at',
    ];

    protected $genres = [
        1=>'主持','推荐','接待','培训',
    ];

    public function genreName()
    {
        return array_key_exists($this->genre,$this->genres) ? $this->genres[$this->genre] : '';
    }

    public function getName()
    {
        return $this->is_name ? '丿龍魂丶'.$this->is_name.'主持' : '';
    }
}