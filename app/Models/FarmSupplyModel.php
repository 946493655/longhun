<?php
namespace App\Models;

class FarmSupplyModel extends BaseModel
{
    /**
     * 自定义单子主持表
     */

    protected $table = 'farms_supply';

    protected $fillable = [
        'id','uid','genre','is_number','is_account','is_name','qq','qq_name','created_at','updated_at',
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
        return $this->is_name ? $this->is_name : '';
    }

    public function qq()
    {
        return $this->qq ? $this->qq : '未填写';
    }

    public function qqName()
    {
        return $this->qq_name ? $this->qq_name : '未填写';
    }

    public function account()
    {
        return $this->is_account ? $this->is_account : $this->is_number;
    }
}