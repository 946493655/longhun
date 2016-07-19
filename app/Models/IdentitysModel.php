<?php
namespace App\Models;

class IdentitysModel extends BaseModel
{
    /**
     * 会员表
     */

    protected $table = 'identitys';

    protected $fillable = [
        'id','genre','qq','mobile','taobao','zfb','address','created_at','updated_at',
    ];

    protected $genres = [
        1=>'会员','高级会员','至尊会员','钻石会员',
    ];
}