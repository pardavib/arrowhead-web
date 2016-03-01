<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'origin',
        'level',
        'message',
    ];

    public function scopeNoDebug($query)
    {
        $query->where('level', '!=', 'DEBUG');
    }

    public function scopeMessage($query)
    {
        \Cache::flush();
        $query->where('message', 'LIKE', 'IN%')->orWhere('message', 'LIKE', 'OUT%');
    }
}
