<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getProfile()
    {
        return view('feeds.profile');
    }

    public function getShareLink()
    {
        return view('share.sharelink');
    }

    public function postShareLink(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100|unique:posts',
            'link'  => 'required|unique:posts',
        ]);

        $post = new Post();
        $post->title = $request['title'];
        $post->link = $request['link'];

        $message = 'There was a error!';

        if ($request->user()->posts()->save($post)){
            $message = 'Your link successfully created!';
        }

        return redirect()->route('index')->with(['success' => $message]);
    }


}
