<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Device extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function backups()
    {
        return $this->hasMany('App\Models\DeviceBackup');
    }
}
