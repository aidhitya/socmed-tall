<?php

namespace App\Models\Timeline;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'hash', 'body'
    ];

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
}
