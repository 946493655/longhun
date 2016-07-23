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

    public function admin()
    {
        return $this->admin_id ? AdminModel::find($this->admin_id) : '';
    }

    public function loginTime()
    {
        return $this->loginTime ? date('Y年m月d日 H:i:s', $this->loginTime) : '';
    }

    public function logoutTime()
    {
        return $this->logoutTime ? date('Y年m月d日 H:i:s', $this->logoutTime) : '';
    }
}