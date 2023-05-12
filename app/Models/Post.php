<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'outfit_id'
    ];

    public function likes(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'post_user');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function timeline()
    // {

    // }
}
