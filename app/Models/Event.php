<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'description',
        'image',
        'registration_start',
        'registration_end',
        'event_start',
        'event_end',
        'mode',
        'location',
        'address',
        'partner',
    ];

    public function evCategory()
    {
        return $this->belongsTo(EventCategory::class, 'category');
    }

    public function participant()
    {
        return $this->hasMany(EventParticipant::class, 'event');
    }
}
