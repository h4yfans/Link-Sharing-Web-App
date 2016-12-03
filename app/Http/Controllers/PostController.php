<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use PostService;

class PostController extends Controller
{
    public function getProfile(PostService $postService)
    {
        $posts = $postService->getPosts();

	    return view('feeds.profile', ['posts' => $posts]);

    }

    public function getShareLink()
    {
        return view('share.sharelink');
    }

    public function postShareLink(Request $request)
    {
        $regex = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        $message = "There was a error!";

        $this->validate($request, [
            'title' => 'required|max:100|unique:posts',
            'link'  => 'required|unique:posts|',
        ]);

        if (preg_match($regex, $request['link'])){
            $post = new Post();
            $post->title = $request['title'];
            $post->link = $request['link'];

            if ($request->user()->posts()->save($post)){
                $message = 'Your link successfully created!';
            }
        }

        return redirect()->route('index')->with(['success' => $message]);
    }


}
