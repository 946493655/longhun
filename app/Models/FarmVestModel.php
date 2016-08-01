<?php
namespace App\Models;

class FarmVestModel extends BaseModel
{
    /**
     * 会员表
     */

    protected $table = 'farms_vest';

    protected $fillable = [
        'id','prefix','tuan','suffix','remark','created_at','updated_at',
    ];

    /**
     * 马甲格式
     */
    public function vest()
    {
        return $this->prefix.'XXX『'.$this->tuan.$this->suffix.'』'.$this->remark;
    }
}