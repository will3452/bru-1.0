<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{

    public function __construct(){
        return $this->middleware('auth');
    }
    private $view_dir = 'scholar.mybooks.';
    public function index(){
        if(request()->q){
            $books = auth()->user()->books()->filterByClass(request()->q)->paginate(10);
        }else {
            $books = auth()->user()->books()->paginate(10);
        }
        return view($this->view_dir.'index', compact('books'));
    }

    public function create(){
        return view($this->view_dir.'create');
    }

    public function store(){
        $validated = request()->validate([
            'class'=>'required',
            'category'=>'required',
            'title'=>'required',
            'type'=>'required',
            'author'=>'required',
            'genre'=>'required',
            'language'=>'required',
            'lead_character'=>'required',
            'lead_college'=>'required',
            'blurb'=>'required|max:3000',
            'cost'=>'',
            'review_question_1'=>'required|max:150',
            'review_question_2'=>'required|max:150',
            'credit'=>'required|max:1000',
            'cover'=>'required|image',
            'tags'=>'required'
        ]);
        
        $newpath = request()->cover->store('public/book_cover');
        $file_array = explode('/',$newpath);
        $end_file = end($file_array);
        $validated['cover'] = '/storage/book_cover/'.$end_file;
        unset($validated['tags']);
        $book_created = auth()->user()->books()->create($validated);

        $tags = explode(',',request()->tags);
        // return $tags;
        foreach($tags as $tag){
           $xtag =  Tag::where('name',$tag)->first();
           if($xtag){
               $xtag->books()->attach($book_created->id);
           }else {
               $xtag = Tag::create(['name'=>$tag]);
               $xtag->books()->attach($book_created->id);
           }
        }
        return back()->with('success','Book Saved! <a href='.$book_created->id.'> click here to view </a>');
    }

    public function show($id){
        $book = auth()->user()->books()->with('chapters')->findOrFail($id);
        // $book = Book::findOrFail($id);
        return view($this->view_dir.'show', compact('book'));
    }


    //extra methods

    public function content_store($id){
        $book =  auth()->user()->books()->findOrFail($id);
        request()->validate([
            'content'=>"required|mimes:pdf"
        ]);
        $path = request()->content->store('public/book_contents_pdf');
        $array_path = explode('/', $path);
        $end_path = end($array_path);
        $new_path = '/storage/book_contents_pdf/'.$end_path;
        $book->content = $new_path;
        $book->save();
        return back()->withSuccess('Done!');
    }
}
