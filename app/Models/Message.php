<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    
    protected $fillable = [
    'sender_id',
    'receiver_id',
    'subject',
    'content',
    'read_at',
];


    
    protected $casts = [
        'read_at' => 'datetime',
    ];

    
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}

