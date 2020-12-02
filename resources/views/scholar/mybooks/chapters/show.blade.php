@extends('layouts.scholar')
@section('content')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <div class="container-fluid">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('books.index') }}">My Books</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('books.show',['id'=>$chapter->book->id]) }}">{{ $chapter->book->title }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{$chapter->title}}</li>
                    </ol>
                  </nav>
    @include('scholar.includes.alert')

        <form action="{{route('chapters.update',$chapter)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="">
                    Chapter Title
                </label>
                <input type="text" class="form-control" name="title" required value="{{ $chapter->title }}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <br>
                <!-- {{ $chapter->book->category }} -->
                @if($chapter->book->category == 'novel')
                @if($chapter->extra)
                    PDF <a href="{{$chapter->extra}}" target="_blank">here</a>
                    <div class="form-group">
                        <input type="file" name="extra" value="{{$chapter->extra}}" required  accept="application/pdf">
                    </div>
                
                @endif
                <textarea name="content" id="editor" cols="30" rows="40">{{$chapter->content}}</textarea>
                <script>
                    CKEDITOR.replace('editor'); 
                    CKEDITOR.config.height = '80vh' 
                </script>
                @else
                    <a href="{{$chapter->content}}">View chapter content</a>
                    <div class="form-group">
                        <input type="file" name="content" value="{{$chapter->content}}" required>
                    </div>
                @endif
            </div>
            <button class="btn btn-block btn-primary">Update</button>
        </form>
    </div>
@endsection
