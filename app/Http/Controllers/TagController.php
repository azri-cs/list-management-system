<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::listing()->get();
        return view('tags.index', [
            'tags' => $tags,
        ]);
    }
}
