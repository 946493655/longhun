<?php
namespace App\Models;

class IdentitysModel extends BaseModel
{
    /**
     * 会员表
     */

    protected $table = 'identitys';

    protected $fillable = [
        'id','uid','genre','qq','mobile','taobao','zfb','address','created_at','updated_at',
    ];

    protected $genres = [
        1=>'会员','高级会员','至尊会员','钻石会员',
    ];

    public function users()
    {
        return UserModel::all();
    }

    public function getUser()
    {
        return $this->uid ? UserModel::find($this->uid) : '';
    }

    public function getUserName()
    {
        return $this->getUser() ? $this->getUser()->username : '';
    }

    public function genreName()
    {
        return array_key_exists($this->genre,$this->genres) ? $this->genres[$this->genre] : '';
    }

    /**
     * 资料完整度
     */
    public function datum()
    {
        $datums = [$this->qq,$this->mobile,$this->taobao,$this->zfb,$this->address];
        $fulls =array();
        foreach ($datums as $datum) {
            if ($datum) { $fulls[] = $datum; }
        }
        return count($fulls) / count($datums) * 100 . '%';
    }
}