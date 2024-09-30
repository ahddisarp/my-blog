<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;


class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
    ];
    
public function user()
{
    return $this->belongsTo(User::class);
}
}
