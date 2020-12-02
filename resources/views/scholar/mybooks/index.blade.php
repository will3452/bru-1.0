@extends('layouts.scholar')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">My Books</li>
        </ol>
      </nav>
    <div class="d-flex justify-content-between align-items-start ">
        <h3>My Books</h3>
        <a href="{{ route('books.create') }}" class="">create new book</a>
    </div>
    <div class="mb-3">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('books.index') }}" class="btn btn-{{ request()->q ? 'outline-':'' }}primary btn-sm">All</a>
            <a href="{{ route('books.index',['q'=>'regular']) }}" class="btn btn-{{ request()->q == 'regular' ? '':'outline-' }}primary btn-sm">Regular</a>
            <a href="{{ route('books.index',['q'=>'premium']) }}" class="btn btn-{{ request()->q == 'premium' ? '':'outline-' }}primary btn-sm">Premium</a>
            <a href="{{ route('books.index',['q'=>'spin-off']) }}" class="btn btn-{{ request()->q == 'spin-off' ? '':'outline-' }}primary btn-sm">Spin-off</a>
            <a href="{{ route('books.index',['q'=>'event']) }}" class="btn btn-{{ request()->q == 'event' ? '':'outline-' }}primary btn-sm">Events</a>
        </div>
    </div>
   @if(count($books))
   <ul class="list-unstyled">
    @foreach($books as $book)
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
    @endforeach
</ul>
    @if (!isset(request()->q))
        {{ $books->links() }}
        @else
        {{ $books->appends(['q'=>request()->q])->links() }}

    @endif

    @else
    <div>
        No books Available
    </div>
   @endif
</div>
@endsection
