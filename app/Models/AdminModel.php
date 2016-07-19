<?php
namespace App\Models;

class AdminModel extends BaseModel
{
    /**
     * 会员表
     */

    protected $table = 'admin';

    protected $fillable = [
        'id','uid','genre','created_at','updated_at',
    ];

    //管理员身份级别：超管，主管，培训，接待，...
    protected $genres = [
        1=>'超管','主管','培训','接待',
    ];

    /**
     * 获取用户信息
     */
    public function getUser()
    {
        return $this->uid ? UserModel::find($this->uid) : '';
    }

    /**
     * 获取用户名称
     */
    public function getUserName()
    {
        return $this->getUser() ? $this->getUser()->username : '';
    }

    /**
     * 获取用户类型
     */
    public function getUserGenreName()
    {
        $genre = $this->getUser() ? $this->getUser()->genre : '';
        return array_key_exists($genre,$this->genres) ? $this->genres[$genre] : '';
    }
}