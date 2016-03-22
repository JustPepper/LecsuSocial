<?php

namespace App\Http\Controllers\Content;

use App\Models\Content;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
    		return view('reader.reader', compact('content'));
    	}
    }

}
	