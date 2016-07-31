<?php
namespace App\Models;

class FarmVestModel extends BaseModel
{
    /**
     * 会员表
     */

    protected $table = 'farms_vest';

    protected $fillable = [
        'id','genre','name','created_at','updated_at',
    ];

    protected $genres = [
        1=>'前缀','团名称','后缀'
    ];

    public function genreName()
    {
        return array_key_exists($this->genre,$this->genres) ? $this->genres[$this->gene] : '';
    }
}