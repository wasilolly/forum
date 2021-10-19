<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request, $slug)
    {
        $attribute = $request->validate([
            'content' => ['required']
        ]);
        $discussion_id = Discussion::where('slug',$slug)->first()->id;
        $attribute['user_id'] = Auth::user()->id;
        $attribute['discussion_id'] = $discussion_id;

        Reply::create($attribute);

        return back();
 
    }
}
