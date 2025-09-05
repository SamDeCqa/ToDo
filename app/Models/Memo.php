<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    /** @use HasFactory<\Database\Factories\MemoFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'info',
        'is_favourite',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
