<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceBackup extends Model {
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'preferences' => 'array'
    ];

    public static function search($query) {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function device() {
        return $this->belongsTo('App\Models\Device');
    }
}
