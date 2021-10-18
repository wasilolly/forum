<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('forum',[
            'discussions' => Discussion::latest()->paginate(10)
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
        $attribute['slug'] = Str::slug($request->title);

        //dd($attribute);

        $thread = Discussion::create($attribute);

        return redirect(route('discussions.show',[
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

        return view('Discuss.show',[
            'discussion' => $thread
        ]);
    }

}
