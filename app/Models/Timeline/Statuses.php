<?php

namespace App\Models\Timeline;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    use HasFactory;

    protected $fillable = [
        'hash', 'body'
    ];

    public function getPublishedAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    // <!-- Relationship -->

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
