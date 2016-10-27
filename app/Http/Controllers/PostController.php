<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getProfile()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('feeds.profile', ['posts' => $posts]);

    }

    public function getShareLink()
    {
        return view('share.sharelink');
    }

    public function postShareLink(Request $request)
    {
        $regex = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";

        $this->validate($request, [
            'title' => 'required|max:100|unique:posts',
            'link'  => 'required|unique:posts|',
        ]);

        if (preg_match($regex, $request['link'])){
            $post = new Post();
            $post->title = $request['title'];
            $post->link = $request['link'];
        }

        $message = 'There was a error!';

        if ($request->user()->posts()->save($post)){
            $message = 'Your link successfully created!';
        }

        return redirect()->route('index')->with(['success' => $message]);
    }


}
