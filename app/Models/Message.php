<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name',
        'content',
        'color',
    ];

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
