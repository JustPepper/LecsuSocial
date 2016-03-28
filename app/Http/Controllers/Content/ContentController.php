<?php

namespace App\Http\Controllers\Content;

use App\Models\Content;
use App\Models\Reading;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index() {
    	$contents = Content::all();
    	return view('pages.content')->with('contents', $contents);
    }

    public function reader($slug) {
    	$content = Content::where('slug', '=', $slug)->firstOrFail();
    	if ($content->price == 0) {
            $last_read = Reading::where('user_id', Auth::id())->where('content_id', $content->id)->first();
    		return view('reader.reader', compact('content', 'last_read'));
    	}
    }

}
	