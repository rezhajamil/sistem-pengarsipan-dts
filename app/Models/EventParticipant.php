<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'event',
        'user',
        'is_finished',
    ];

    public function dataEvent()
    {
        return $this->belongsTo(Event::class, 'event');
    }

    public function dataUser()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
