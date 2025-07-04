<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'message_id',
        'content',
        'color',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
