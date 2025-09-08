<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /** @use HasFactory<\Database\Factories\EventFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description',
        'user_id',
        'from',
        'due',
        'is_completed',
        'is_favourite',
        'is_notified',
    ];

    protected $casts = [
        'from' => 'datetime', 
        'due' => 'datetime', 
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
