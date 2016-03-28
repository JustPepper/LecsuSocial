<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
use App\Models\Reading;
use App\Models\Status;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    public function photo() {
    	return Auth::user()->photo;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function checkFollower($id) {
    	return Response::json(Auth::user()->isFollowing($id));
    }

    public function checkStatusLike($id) {
        return Response::json(Status::find($id)->checkLike());
    }

    public function checkCommentLike($id) {
        return Response::json(Comment::find($id)->checkLike());
    }

    public function saveLastRead(Request $request) {
        $reading = Reading::firstOrNew(['user_id' => Auth::id(), 'content_id' => $request->input('id')]);
        $reading->epubcfi = $request->input('epubcfi');
        $reading->save();
    }

}
