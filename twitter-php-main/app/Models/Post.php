<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'text', 
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('M d, Y');
    }

    public function setTextAttribute($value)
    {
        $this->attributes['text'] = strip_tags($value);
    }

    protected static function booted()
    {
        static::creating(function ($post) {
            if (is_null($post->user_id) && auth()->check()) {
                $post->user_id = auth()->id();
            }
        });
    }
}
