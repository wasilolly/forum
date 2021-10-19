<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Reply;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forum', [
            'discussions' => Discussion::latest()->paginate(5)
        ]);
    }

    public function dashboard()
    {
        return view('dashboard', [
            'discussions' => Discussion::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discuss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
            'channel_id' => ['required']
        ]);
        $attribute['user_id'] = Auth::user()->id;

        $slug = Str::slug($request->title);
        $isSlugUnique =  Discussion::where('slug', $slug)->first();
        if (isset($isSlugUnique)) {
            $thisThreadId = Discussion::get()->last()->id;
            $thisThreadId++;
            $newSlug = $slug . '-' . $thisThreadId;
            $attribute['slug'] = $newSlug;
        } else {
            $attribute['slug'] = $slug;
        }

        $thread = Discussion::create($attribute);

        return redirect(route('discussions.show', [
            'slug' => $thread->slug
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $thread = Discussion::where('slug', $slug)->first();

        return view('Discuss.show', [
            'discussion' => $thread,
            'replies' => $thread->replies()->with('user')->paginate(5)
        ]);
    }

    public function reply(Request $request, $slug)
    {
        $attribute = $request->validate([
            'content' => ['required']
        ]);
        $discussion_id = Discussion::where('slug', $slug)->first()->id;
        $attribute['user_id'] = Auth::user()->id;
        $attribute['discussion_id'] = $discussion_id;

        Reply::create($attribute);

        return back();
    }
}
