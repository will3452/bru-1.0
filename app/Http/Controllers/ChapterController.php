<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function store(){
        if(request()->book_cat != 'novel'){
            $validated = request()->validate([
                'book_id'=>'required',
                'title'=>'required',
                'type'=>'required',
                'art_scene'=>'image',
                'cost'=>'',
                'content'=>'required|mimes:pdf'
            ]);

            $path = request()->content->store('public/chapter_pdf');
            $array_path = explode('/', $path);
            $end_path = end($array_path);
            $newpath = '/storage/chapter_pdf/'.$end_path;
            $validated['content'] = $newpath;
            if(request()->art_scene){
                $art_path = request()->art_scene->store('public/art_scenes');
                $art_path_array = explode('/', $art_path);
                $end_path = end($art_path_array);
                $newpath = '/storage/art_scenes/'.$end_path;
                $validated['art_scene'] = $newpath;
            }
            Chapter::create($validated);
            return back()->withSuccess('Done!');

            
        }else {
            $validated = request()->validate([
                'book_id'=>'required',
                'title'=>'required',
                'type'=>'required',
                'art_scene'=>'image',
                'cost'=>'',
                'content'=>'',
                'extra'=>''
            ]);
            if(request()->extra){
                $extra = request()->extra->store('public/extra');
                $extra_array = explode('/', $extra);
                $extra = end($extra_array);
                $newpath = '/storage/extra/'.$extra;
                $validated['extra'] = $newpath;
            }
            if(request()->art_scene){
                $art_path = request()->art_scene->store('public/art_scenes');
                $art_path_array = explode('/', $art_path);
                $end_path = end($art_path_array);
                $newpath = '/storage/art_scenes/'.$end_path;
                $validated['art_scene'] = $newpath;
            }
            Chapter::create($validated);
            return back()->withSuccess('Done!');
        }
        
        
    }

    public function show($id){
        $chapter = Chapter::with('book')->findOrFail($id);
        return view('scholar.mybooks.chapters.show', compact('chapter'));
    }

    public function update($id){
        $chapter = Chapter::findOrFail($id);
        $validated = request()->validate([
            'title'=>'required',
            'content'=>'',
            'extra'=>''
        ]);
        if(request()->extra){
            $extra = request()->extra->store('public/extra');
            $extra_array = explode('/', $extra);
            $extra = end($extra_array);
            $newpath = '/storage/extra/'.$extra;
            $validated['extra'] = $newpath;
        }
        $result = $chapter->update($validated);

        return back()->withSuccess('Done!');
    }
}
