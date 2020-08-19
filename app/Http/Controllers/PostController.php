<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Bulkly\Post;
use Bulkly\SocialPostGroups;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BufferPosting::with('groupInfo','accountInfo')->paginate(20);
        $groups = SocialPostGroups::distinct('type')->pluck('type');
       // dd($groups);
        return view('pages.post', compact('posts', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $text = $request->input('text');
        $date= $request->input('date');
        $posts = BufferPosting::with('groupInfo','accountInfo')->where('post_text', 'like','%'.$text.'%')->whereHas('groupInfo',function($query) use ($request) {
            $query->where('type' , '=' , $request->input('group'));
        })->WhereDate('created_at', $date)->paginate(20);
        $groups = SocialPostGroups::distinct('type')->pluck('type');
        return view('pages.post', compact('posts', 'groups'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Bulkly\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bulkly\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Bulkly\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bulkly\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
