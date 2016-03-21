<?php

namespace App\Http\Controllers\User;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index() {
    	$statuses = Auth::user()->statuses;
    	return view('pages.index')->with('statuses', $statuses);
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
}
