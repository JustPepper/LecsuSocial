<?php

namespace App\Http\Controllers\Content;

use App\Models\Content;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function index() {
    	$contents = Content::all();
    	return view('pages.content')->with('contents', $contents);
    }
}
	