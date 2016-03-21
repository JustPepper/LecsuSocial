<?php

namespace App\Http\Controllers\User;

use App\Models\Follower;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
	/**
	 * Upload user profile photo
	 * @param Request $request
	 * @return mixed
	 */
    public function uploadPhoto(Request $request) {
    	$photo = $request->file('photo');
    	$photo_name = time() . $photo->getClientOriginalName();
    	$photo->move('img/profile-pictures/', $photo_name);
    	Auth::user()->addPhoto($photo_name);
    	return Auth::user()->photo;
    }

    /**
     * Show user search results
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchUsers(Request $request) { 
        //$results = User::SearchByKeyword($request->input('keyword'))->get();
        $results = User::all()->take(20);
        return view('pages.search')->with('results', $results);
    }

    public function follow($id) {
        if (Auth::user()->isFollowing($id)) {
           $follow = Follower::where('user', Auth::id())->where('is_following', $id);
           $follow->delete();
        } else {
            $follow = new Follower();
            $follow->user = Auth::id();
            $follow->is_following = $id;
            $follow->save();
        }
    }

}
