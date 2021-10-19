<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Discussion;
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

}
