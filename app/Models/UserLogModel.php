<?php
namespace App\Models;

class UserLogModel extends BaseModel
{
    /**
     * 会员表
     */

    protected $table = 'users_log';

    protected $fillable = [
        'id','uid','loginTime','logoutTime',
    ];

    public function user()
    {
        return $this->uid ? UserModel::find($this->uid) : '';
    }

    public function userName()
    {
        return $this->user() ? $this->user()->username : '';
    }

    public function loginTime()
    {
        return $this->loginTime ? date('Y年m月d日 H:i:s', $this->loginTime) : '非正常退出';
    }

    public function logoutTime()
    {
        return $this->logoutTime ? date('Y年m月d日 H:i:s', $this->logoutTime) : '非正常退出';
    }
}