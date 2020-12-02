@extends('layouts.scholar')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="#">Tags</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$tag->name}}</li>
    </ol>
    </nav>
    @if(count($tag->books))
    <h3>"{{$tag->name}}"</h3>
   <ul class="list-unstyled">
    @foreach($tag->books as $book)
        @can('can_view', $book)
        <li class="media mb-2">
            <img src="{{ $book->cover }}" class="mr-3" alt="{{ $book->title }} cover" class="img-fluid" style="max-width:100px;object-fit:cover;">
            <div class="media-body">
            <div class="d-flex align-items-start">
                 <h5 class="mt-0 mb-1"><a href="{{ route('books.show',$book->id) }}">{{ $book->title }}</a></h5>
                <small class="ml-2 badge badge-success">
                    {{ $book->class }}
                </small>
            </div>
                <div class="text-justify">
                    {{ Str::limit($book->blurb, $limit = 250, $end = '...') }}
                @if(strlen($book->blurb) > 250)
                    <a href="{{ route('books.show',$book->id) }}#blurb">read more</a>
                @endif
                </div>
            </div>
        </li>
        @endcan
    @endforeach
</ul>

    @else
    <div>
        No books Available
    </div>
   @endif
</div>
@endsection
