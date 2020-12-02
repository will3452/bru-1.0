@extends('layouts.scholar')
@section('content')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-9">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('books.index') }}">My Books</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ $book->title }}</li>
                    </ol>
                  </nav>
                  
                @include('scholar.includes.alert')
                @if($book->content == null)
                <h4>
                    Content Details
                </h4>
                    
                    <form action="{{ route('books.store_content',$book) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="bg-warning p-2">
                            Upload a PDF containing the following
                            <ul>
                                <li>Book title Page</li>
                                <li>Copyright Page</li>
                                <li>Acknowledgements Page</li>
                                <li>Dedication Page</li>
                            </ul>
                            <input type="file" name="content" required accept="application/pdf">
                            <button class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                @endif
                <h4>Create Chapter</h4>
                <form action="{{ route('chapters.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="book_cat" value="{{ $book->category }}">
                    <input type="hidden" value="{{ $book->id }}" name="book_id" >
                    <div class="form-group">
                        <label for="">Chapter Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    @if($book->category =='novel')
                        <textarea name="content" id="editor"placeholder="Write Content here" required style="height:70vh">
                            {{ old('content') }}
                        </textarea>
                        <div class="form-group mt-2">
                            <div class="">Upload Pdf file instead ? </div>
                            <input type="file" name="extra" accept="application/pdf">
                        </div>
                        <script>
                           CKEDITOR.replace('editor');
                           CKEDITOR.config.height = '50vh';
                            CKEDITOR.config.width = 'auto';
                        </script>
                    @else
                        <div class="form-group">
                            <div class="alert-info alert">Upload Content (PDF file only)</div>
                            <input type="file" name="content" required accept="application/pdf">
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="">Chapter Type</label>
                        <select name="type" id="chaptype" class="form-control">
                            <option value="regular">Regular Chapter</option>
                            <option value="special">Special Chapter</option>
                            <option value="premium">Premium Chapter</option>
                        </select>
                    </div>

                    <div class="form-group" id="artdiv">
                        <div>Free Art Scene (Optional)</div>
                        <input type="file" name="art_scene" accept="image/*">
                    </div>
                    <script>
                        const chaptype = document.getElementById('chaptype');
                        const artdiv = document.getElementById('artdiv');
                        artdiv.style.display = 'none';
                        chaptype.addEventListener('change', function(){
                            if(this.value == 'premium'){
                                artdiv.style.display= 'block'
                            }else {
                                artdiv.style.display= 'none'
                            }
                        });
                    </script>
                    <div class="form-group">
                        <label for="">Cost</label>
                        <input type="number" name="cost" value="0" class="form-control">
                        <small>Set value to '0' if it is Free</small>
                    </div>
                    <button class="btn btn-success btn-block">
                        Add Chapter
                    </button>
                </form>
                <br>
                <hr>
                @if(count($book->chapters))
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                Chapters
                            </div>
                            <div>
                                total: {{ count($book->chapters) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @php $chapcount = 1; @endphp
                            @foreach($book->chapters as $chap)
                           <li class="d-flex align-items-center">
                               <span class="bg-primary text-white text-center rounded-circle" style="width:20px;height:20px;font-size:100%">{{ $chapcount++ }}</span>
                               <img src="{{ $chap->art_scene ? $chap->art_scene: $book->cover }}" alt="" style="height:25px;width:25px;object-fit:cover;" class="m-2">
                               <div>
                                   <a href="{{route('chapters.show',$chap)}}">{{ $chap->title }}</a> ({{ $chap->type }})
                               </div>
                           </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-md-3 mt-2">
            <a href="#" class="btn btn-primary btn-block">Publish Book Now</a>
                <h3>
                    Book Details
                </h3>
                <img src="{{ $book->cover }}" alt="{{ $book->title }} cover" class="img-fluid">
                <div class="d-flex align-items-start mt-2">
                    <h5>{{ $book->title }}</h5>
                    <span class="ml-1 badge badge-success">{{ $book->class }}</span>
                </div>
                <div class="card card-body">
                    Author: {{ $book->author }}
                    <br>
                    Genre : {{ $book->genre }}
                    <br>
                    Categories : {{ $book->category }}
                    <br>
                    Type : {{ $book->type }}
                    <div>
                        Lead's College : {{ $book->lead_college }}
                    </div>
                    <div>
                        Lead Character: {{ $book->lead_character }}
                    </div>
                    @if($book->tags()->count())
                    <div>
                        tags : 
                        @foreach($book->tags as $tag)
                            <a href="{{route('tags.show',$tag)}}" class="badge badge-primary">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    @endif
                    @if($book->class != 'regular')
                        Cost : {{ $book->cost ?? '0'}}
                    <br>
                    @endif
                    Language: {{ $book->language }}
                    <br>
                    <div>
                        Review Question 1: 
                        {{ $book->review_question_1 }}
                    </div>
                    <div>
                        Review Question 2: 
                        {{ $book->review_question_2}}
                    </div>
                    <div>
                        Credit page: 
                        {{ $book->credit }}
                    </div>
                    @if($book->content)
                    <div>
                        Content details PDF: 
                        <a href="{{ $book->content }}" target="_blank">Click to view</a>
                    </div>
                    @endif
                </div>
            </div>
            
        </div>
        <div class="row mt-5 " id="blurb">
            <div class="col-md-9">
                <h5>The Blurb</h5>
                <div class="text-justify">
                    {{ $book->blurb }}
                </div>
            </div>
        </div>
    </div>
@endsection
