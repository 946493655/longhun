<?php
namespace App\Models;

class AdminLogModel extends BaseModel
{
    /**
     * 会员表
     */

    protected $table = 'admin_log';

    protected $fillable = [
        'id','admin_id','loginTime','logoutTime','lastLogin',
    ];

    public function admin()
    {
        return $this->admin_id ? AdminModel::find($this->admin_id) : '';
    }

//    public function loginTime()
//    {
//        return $this->loginTime ? date('Y年m月d日 H:i:s', $this->loginTime) : '';
//    }
//
//    public function logoutTime()
//    {
//        return $this->logoutTime ? date('Y年m月d日 H:i:s', $this->logoutTime) : '';
//    }
}