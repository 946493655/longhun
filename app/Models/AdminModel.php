<?php
namespace App\Models;

use Illuminate\Support\Facades\Hash;

class AdminModel extends BaseModel
{
    /**
     * 会员表
     */

    protected $table = 'admin';

    protected $fillable = [
        'id','username','realname','pwd','genre','created_at','updated_at',
    ];

    //管理员身份级别：超管，主管，培训，接待，...
    protected $genres = [
        1=>'超管','主管','培训','接待',
    ];

    /**
     * 获取管理员类型
     */
    public function genreName()
    {
        return array_key_exists($this->genre,$this->genres) ? $this->genres[$this->genre] : '';
    }

    /**
     * 检查是否初始密码
     */
    public function ispwd()
    {
        return Hash::check(123456,$this->pwd) ? "初始密码" : "已更新";
    }
}