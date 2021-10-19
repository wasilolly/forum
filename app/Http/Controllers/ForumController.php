<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Watcher;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{

    public function like($id)
    {
        Like::create([
            'user_id' => Auth::user()->id,
            'discussion_id' => $id
        ]);

        return back();
    }

    public function unLike()
    {
        Like::where('user_id', Auth::user()->id)->delete();
        return back();
    }

    public function watch($id)
    {
        Watcher::create([
            'user_id' => Auth::user()->id,
            'discussion_id' => $id
        ]);

        return back()->with('success', 'You are now watching this thread');
    }

    public function unWatch($id)
    {
        Watcher::where('user_id', Auth::user()->id)->delete();
        return back()->with('success', 'You are no longer watching this thread');
    }
}
