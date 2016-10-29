<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Auth;
use Request;

class LikeController extends Controller
{
    public function UpdateLike()
    {
        if (Request::ajax()) {
            $class = Request::input('class');
            $postId = Request::input('postId');

            $previousVote = Like::where('user_id', \Auth::id())->where('post_id', $postId)->first();
            $isUpvote = preg_match('/(up)/', $class);

            //Check if user want to up or down vote already voted
            if (!is_null($previousVote)) {
                if ($isUpvote == 1) {
                    if ($previousVote->vote == 'up') {
                        //Cancel out previous upvote
                        $previousVote->delete();
                    } else {
                        $previousVote->update(['vote' => 'up']);
                    }
                } else if ($isUpvote == 0) {
                    if ($previousVote->vote == 'down') {
                        //Cancel out previous downvote
                        $previousVote->delete();
                    } else {
                        $previousVote->update(['vote' => 'down']);
                    }
                }
            } else {
                //Create a new vote
                $like = new Like();
                $like->user_id = Auth::id();
                $like->post_id = $postId;
                $like->vote = $isUpvote ? 'up' : 'down';


                $like->save();
            }
        }
    }

    public function UpdateLikeSum()
    {
        if (Request::ajax()) {
            $postId = Request::input('postId');

            $post = Post::find($postId);
            return \Response::json(['post_id' => $postId, 'post' => $post->likes()->count()]);

        }
    }
}
