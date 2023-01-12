<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * 認証　に関連するユーザーレコードを取得
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
