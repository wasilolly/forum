<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        return $this->hasMany(Reply::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function watchers()
    {
        return $this->hasMany(Watcher::class);
    }

    public function likedByAuthUser()
    {
        $id = Auth::user()->id;
        $likers = array();

        foreach ($this->likes as $like) {
            array_push($likers, $like->user_id);
        }
        if (in_array($id, $likers)) {
            return true;
        }

        return false;
    }

    public function watchedByAuthUser()
    {
        $id = Auth::user()->id;
        $watchers = array();

        foreach ($this->watchers as $watcher) {
            array_push($watchers, $watcher->user_id);
        }
        if (in_array($id, $watchers)) {
            return true;
        }

        return false;
    }

}
