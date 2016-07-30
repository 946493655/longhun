<?php
namespace App\Models;

class AdminLogModel extends BaseModel
{
    /**
     * 会员表
     */

    protected $table = 'admin_log';

    protected $fillable = [
        'id','admin_id','loginTime','logoutTime',
    ];

    public function admin()
    {
        return $this->admin_id ? AdminModel::find($this->admin_id) : '';
    }

    public function adminUserName()
    {
        return $this->admin() ? $this->admin()->username : '';
    }

    public function adminGenreName()
    {
        return $this->admin() ? $this->admin()['genres'][$this->admin()->genre] : '';
    }

    public function loginTime()
    {
        return $this->loginTime ? date('Y年m月d日 H:i:s', $this->loginTime) : '';
    }

    public function logoutTime()
    {
        return $this->logoutTime ? date('Y年m月d日 H:i:s', $this->logoutTime) : '非正常退出';
    }
}