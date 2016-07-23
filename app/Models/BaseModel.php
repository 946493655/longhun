<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $timestamps = false;

    public function createTime()
    {
        return $this->created_at ? date('Y年m月d日 H:i',$this->created_at) : '';
    }

    public function updateTime()
    {
        return $this->updated_at ? date('Y年m月d日 H:i',$this->updated_at) : '';
    }
}