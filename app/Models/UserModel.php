<?php
namespace App\Models;

use Illuminate\Support\Facades\Hash;

class UserModel extends BaseModel
{
    /**
     * 会员表
     */

    protected $table = 'users';

    protected $fillable = [
        'id','username','realname','pwd','pwd_ori','created_at','updated_at','lastLogin',
    ];

    protected $genres = [
        1=>'高级会员','至尊会员','钻石会员',
    ];

    /**
     * 检查是否初始密码
     */
    public function ispwd()
    {
        return Hash::check(PWD_INIT,$this->pwd) ? "初始密码" : "已更新";
    }

    public function getUserIdentity()
    {
        return $this->id ? IdentitysModel::where('uid',$this->id)->get() : '';
    }

    public function genreName()
    {
        return array_key_exists($this->genre,$this->genres) ? $this->genres[$this->genre] : '';
    }
}