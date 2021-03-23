<?php

namespace App\Models\Timeline;

use App\Models\User;
use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory, Likeable;

    protected $fillable = [
        'hash', 'body'
    ];

    protected $with = ['user'];
    protected $withCount = ['comments'];

    public function getPublishedAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getRouteKeyName()
    {
        return 'hash';
    }

    // <!-- Relationship -->

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
