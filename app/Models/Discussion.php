<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id', 'channel_id', 'slug'];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the replies for the Discussion
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Replies::class);
    }
}
