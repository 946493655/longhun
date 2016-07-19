<?php
namespace App\Models;

class UserModel extends BaseModel
{
    /**
     * 会员表
     */

    protected $table = 'users';

    protected $fillable = [
        'id','username','password','created_at','updated_at',
    ];
}