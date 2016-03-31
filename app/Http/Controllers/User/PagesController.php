<?php

namespace App\Http\Controllers\User;

use App\Models\Content;
use App\Models\Status;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index() {
    	$statuses = Auth::user()->statuses;
        $content = Auth::user()->wishlist()->lists('content_id');
        $contents = Content::whereIn('id', $content)->get();
    	return view('pages.index', compact('statuses', 'contents'));
    }

	/**
	 * Show community page
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function community() {
    	$ids = Auth::user()->follows()->lists('is_following');
        $ids[] = Auth::id();
    	$statuses = Status::whereIn('author_id', $ids)->get();
    	return view('pages.community', compact("statuses"));
    }

    public function profile($alias) {
        $user = User::where('alias', '=', $alias)->firstOrFail();
        return view('pages.profile')->with('user', $user);
    }
}
