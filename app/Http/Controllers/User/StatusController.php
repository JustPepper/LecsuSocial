<?php

namespace App\Http\Controllers\User;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Status;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StatusController extends Controller
{
    /**
     * Save a new status
     * @param Request $request
     * @return mixed
     */
    public function storeStatus(Request $request) {
    	Auth::user()->statuses()->save(new Status($request->all()));
    	return Redirect::back();
    }

    /**
     * Save a new comment
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function storeComment(Request $request, $id) {
    	$comment = new Comment($request->all());
    	$comment->author_id = Auth::id();
    	Status::findOrFail($id)->comments()->save($comment);
    	return Redirect::back();
    }

    /**
     * Save a new reply
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function storeReply(Request $request, $id) {
        $comment = new Comment($request->all());
        $comment->author_id = Auth::id();
        Comment::findOrFail($id)->replies()->save($comment);
        return Redirect::back();
    }

    public function likeStatus($id) {
        if(Status::find($id)->checkLike()){
            $like = Status::find($id)->likes()->where('author_id', '=', Auth::id());
            $like->delete();
        } else {
            $like = new Like();
            $like->author_id = Auth::id();
            Status::findOrFail($id)->likes()->save($like);
        }
    }

    public function likeComment($id) {
        if(Comment::find($id)->checkLike()){
            $like = Comment::find($id)->likes()->where('author_id', '=', Auth::id());
            $like->delete();
        } else {
            $like = new Like();
            $like->author_id = Auth::id();
            Comment::findOrFail($id)->likes()->save($like);
        }
    }


}
