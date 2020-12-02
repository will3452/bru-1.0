<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($id){
        $tag = Tag::with('books')->findOrFail($id);
        return view('scholar.tags.show', compact('tag'));
    }
}