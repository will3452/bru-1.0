@extends('layouts.scholar')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .i-tag{
        border-radius:2px;
        cursor:pointer;
    }
</style>
<div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('books.index') }}">My Books</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
    <div>
        <h2>
            Create book
        </h2>
        @include('scholar.includes.alert')
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="Regular-tab" data-toggle="tab" href="#Regular" role="tab" aria-controls="Regular" aria-selected="true">Regular</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="Premium-tab" data-toggle="tab" href="#Premium" role="tab" aria-controls="Premium" aria-selected="false">Premium</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="Spinoff-tab" data-toggle="tab" href="#Spinoff" role="tab" aria-controls="Spinoff" aria-selected="false">Spin-off</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="event-tab" data-toggle="tab" href="#event" role="tab" aria-controls="event" aria-selected="false">Event</a>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="Regular" role="tabpanel" aria-labelledby="Regular-tab">
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="class" value="regular">
                    <div class="form-group">
                        <label>Book Category</label>
                        <select name="category" id="" class="form-control" required>
                            <option value="novel">novel</option>
                            <option value="illustrated novel">Illustrated Novel</option>
                            <option value="comic novel">Comic Novel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Book Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    
                    <div class="form-group">
                        <div>
                            Upload Cover
                        </div>
                        <input type="file" name="cover" id=""required>
<div class="alert alert-warning mt-4">
<strong class="d-block">Required</strong>
I certify that I own sole copyright of all the materials I have uploaded on this site and my account, and that I have obtained permission in writing to use them, in case I share copyright with another individual or entity. I hold  BRUMultiverse free of liabilities should any copyright infringement occurs.
<div>
<input type="checkbox"  name="cpy_right"> ok 
</div> 
</div>
                    </div>

                    <div class="form-group">
                        <label>Book Types</label>
                        <select name="type" id="" class="form-control" required>
                            <option value="searies">Series</option>
                            <option value="novel">Novel</option>
                            <option value="illustrated Novel">Illustrated Novel</option>
                            <option value="anthology">Anthology</option>
                            <option value="comic book">Comic book</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Author's name</label>
                        <input type="text" name="author" value="{{ auth()->user()->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <select name="genre" id="" class="form-control" required>
                            <option value="Teen and Young Adult">Teen and Young Adult</option>
                            <option value="New Adult">New Adult</option>
                            <option value="Romance">Romance</option>
                            <option value="Detective and Mystery">Detective and Mystery</option>
                            <option value="Action">Action</option>
                            <option value="Historical">Historical</option>
                            <option value="LGBTQIA+">LGBTQIA+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Language</label>
                        <select name="language" id="" class="form-control" required>
                            <option value="Filipino">Filipino</option>
                            <option value="English">English</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lead Character</label>
                        <select name="lead_character" id="" class="form-control" required>
                            <option value="male">male</option>
                            <option value="female">female</option>
                            <option value="LGBTQI+">LGBTQI+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lead College</label>
                        <select name="lead_college" id="" class="form-control" required>
                            <option value="Integrated School">Integrated School</option>
                            <option value="Berkeley">Berkeley</option>
                            <option value="Reagan">Reagan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tags</label>
                        <div class="tag-container"></div>
                        <input type="hidden" name="tags" class="tags" required>
                        <input type="text"  class="form-control tag-input">
                    </div>
                    <div class="form-group">
                        <label for="blurb">Blurb</label>
                        <textarea name="blurb" class="form-control" max="3000" placeholder="3000 characters only" required></textarea>
                    </div>
                   <input type="hidden" name="cost" value="0">
                    <div class="form-group">
                        <label for="review_question_1">Review question 1</label>
                        <textarea name="review_question_1" class="form-control" max="150" placeholder="150 characters only" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="review_question_2">Review question 2</label>
                        <textarea name="review_question_2" class="form-control" max="150" placeholder="150 characters only" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="credit">Credits page</label>
                        <textarea name="credit" class="form-control" max="1000" placeholder="1000 characters only" required></textarea>
                    </div>
                    <button class="btn btn-block btn-primary">CREATE</button>
                </form>
            </div>

            <div class="tab-pane fade" id="Premium" role="tabpanel" aria-labelledby="Premium-tab">
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="class" value="premium">
                    <div class="form-group">
                        <label>Book Category</label>
                        <select name="category" id="" class="form-control" required>
                            <option value="novel">novel</option>
                            <option value="illustrated novel">Illustrated Novel</option>
                            <option value="comic novel">Comic Novel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Book Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    
                    <div class="form-group">
                        <div>
                            Upload Cover
                        </div>
                        <input type="file" name="cover" id=""required>
<div class="alert alert-warning mt-4">
<strong class="d-block">Required</strong>
I certify that I own sole copyright of all the materials I have uploaded on this site and my account, and that I have obtained permission in writing to use them, in case I share copyright with another individual or entity. I hold  BRUMultiverse free of liabilities should any copyright infringement occurs.
<div>
<input type="checkbox"  name="cpy_right"> ok 
</div> 
</div>
                    </div>

                    <div class="form-group">
                        <label>Book Types</label>
                        <select name="type" id="" class="form-control" required>
                            <option value="searies">Series</option>
                            <option value="novel">Novel</option>
                            <option value="illustrated Novel">Illustrated Novel</option>
                            <option value="anthology">Anthology</option>
                            <option value="comic book">Comic book</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Author's name</label>
                        <input type="text" name="author" value="{{ auth()->user()->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <select name="genre" id="" class="form-control" required>
                            <option value="Teen and Young Adult">Teen and Young Adult</option>
                            <option value="New Adult">New Adult</option>
                            <option value="Romance">Romance</option>
                            <option value="Detective and Mystery">Detective and Mystery</option>
                            <option value="Action">Action</option>
                            <option value="Historical">Historical</option>
                            <option value="LGBTQIA+">LGBTQIA+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Language</label>
                        <select name="language" id="" class="form-control" required>
                            <option value="Filipino">Filipino</option>
                            <option value="English">English</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lead Character</label>
                        <select name="lead_character" id="" class="form-control" required>
                            <option value="male">male</option>
                            <option value="female">female</option>
                            <option value="LGBTQI+">LGBTQI+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lead College</label>
                        <select name="lead_college" id="" class="form-control" required>
                            <option value="Integrated School">Integrated School</option>
                            <option value="Berkeley">Berkeley</option>
                            <option value="Reagan">Reagan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tags</label>
                        <div class="tag-container"></div>
                        <input type="hidden" name="tags" class="tags" required>
                        <input type="text"  class="form-control tag-input">
                    </div>
                    <div class="form-group">
                        <label for="blurb">Blurb</label>
                        <textarea name="blurb" class="form-control" max="3000" placeholder="3000 characters only" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Book Cost</label>
                        <input type="number" class="form-control" required placeholder="GEM" name="cost">
                    </div>
                    <div class="form-group">
                        <label for="review_question_1">Review question 1</label>
                        <textarea name="review_question_1" class="form-control" max="150" placeholder="150 characters only" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="review_question_2">Review question 2</label>
                        <textarea name="review_question_2" class="form-control" max="150" placeholder="150 characters only" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="credit">Credits page</label>
                        <textarea name="credit" class="form-control" max="1000" placeholder="1000 characters only" required></textarea>
                    </div>
                    <button class="btn btn-block btn-primary">CREATE</button>
                </form>
            </div>
            <div class="tab-pane fade" id="Spinoff" role="tabpanel" aria-labelledby="Spinoff-tab">
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="class" value="spin-off">
                    <div class="form-group">
                        <label>Book Category</label>
                        <select name="category" id="" class="form-control" required>
                            <option value="novel">novel</option>
                            <option value="illustrated novel">Illustrated Novel</option>
                            <option value="comic novel">Comic Novel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Book Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    
                    <div class="form-group">
                        <div>
                            Upload Cover
                        </div>
                        <input type="file" name="cover" id=""required>
                        <div class="alert alert-warning mt-4">
<strong class="d-block">Required</strong>
I certify that I own sole copyright of all the materials I have uploaded on this site and my account, and that I have obtained permission in writing to use them, in case I share copyright with another individual or entity. I hold  BRUMultiverse free of liabilities should any copyright infringement occurs.
<div>
<input type="checkbox"  name="cpy_right"> ok 
</div> 
</div> 
                    </div>

                    <div class="form-group">
                        <label>Book Types</label>
                        <select name="type" id="" class="form-control" required>
                            <option value="novel">Novel</option>
                            <option value="illustrated Novel">Illustrated Novel</option>
                            <option value="comic book">Comic book</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Author's name</label>
                        <input type="text" name="author" value="{{ auth()->user()->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <select name="genre" id="" class="form-control" required>
                            <option value="Teen and Young Adult">Teen and Young Adult</option>
                            <option value="New Adult">New Adult</option>
                            <option value="Romance">Romance</option>
                            <option value="Detective and Mystery">Detective and Mystery</option>
                            <option value="Action">Action</option>
                            <option value="Historical">Historical</option>
                            <option value="LGBTQIA+">LGBTQIA+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Language</label>
                        <select name="language" id="" class="form-control" required>
                            <option value="Filipino">Filipino</option>
                            <option value="English">English</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lead Character</label>
                        <select name="lead_character" id="" class="form-control" required>
                            <option value="male">male</option>
                            <option value="female">female</option>
                            <option value="LGBTQI+">LGBTQI+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lead College</label>
                        <select name="lead_college" id="" class="form-control" required>
                            <option value="Integrated School">Integrated School</option>
                            <option value="Berkeley">Berkeley</option>
                            <option value="Reagan">Reagan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tags</label>
                        <div class="tag-container"></div>
                        <input type="hidden" name="tags" class="tags" required>
                        <input type="text"  class="form-control tag-input">
                    </div>
                    <div class="form-group">
                        <label for="blurb">Blurb</label>
                        <textarea name="blurb" class="form-control" max="3000" placeholder="3000 characters only" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Book Cost</label>
                        <input type="number" class="form-control" value="6" max="10" required placeholder="GEM" name="cost">
                    </div>
                    <div class="form-group">
                        <label for="review_question_1">Review question 1</label>
                        <textarea name="review_question_1" class="form-control" max="150" placeholder="150 characters only" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="review_question_2">Review question 2</label>
                        <textarea name="review_question_2" class="form-control" max="150" placeholder="150 characters only" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="credit">Credits page</label>
                        <textarea name="credit" class="form-control" max="1000" placeholder="1000 characters only" required></textarea>
                    </div>
                    <button class="btn btn-block btn-primary">CREATE</button>
                </form>
            </div>
            <div class="tab-pane fade" id="event" role="tabpanel" aria-labelledby="event-tab">
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">@csrf
                    <input type="hidden" name="class" value="event">
                    <div class="form-group">
                        <label>Book Category</label>
                        <select name="category" id="" class="form-control" required>
                            <option value="novel">novel</option>
                            <option value="illustrated novel">Illustrated Novel</option>
                            <option value="comic novel">Comic Novel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Book Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <div>
                            Upload Cover
                        </div>
                        <input type="file" name="cover" id=""required>
                        <div class="alert alert-warning mt-4">
<strong class="d-block">Required</strong>
I certify that I own sole copyright of all the materials I have uploaded on this site and my account, and that I have obtained permission in writing to use them, in case I share copyright with another individual or entity. I hold  BRUMultiverse free of liabilities should any copyright infringement occurs.
<div>
<input type="checkbox"  name="cpy_right"> ok 
</div> 
</div>
                    </div>

                    <div class="form-group">
                        <label>Book Types</label>
                        <select name="type" id="" class="form-control" required>
                            <option value="novel">Novel</option>
                            <option value="illustrated Novel">Illustrated Novel</option>
                            <option value="comic book">Comic book</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Author's name</label>
                        <input type="text" name="author" value="{{ auth()->user()->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Genre</label>
                        <select name="genre" id="" class="form-control" required>
                            <option value="Teen and Young Adult">Teen and Young Adult</option>
                            <option value="New Adult">New Adult</option>
                            <option value="Romance">Romance</option>
                            <option value="Detective and Mystery">Detective and Mystery</option>
                            <option value="Action">Action</option>
                            <option value="Historical">Historical</option>
                            <option value="LGBTQIA+">LGBTQIA+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Language</label>
                        <select name="language" id="" class="form-control" required>
                            <option value="Filipino">Filipino</option>
                            <option value="English">English</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lead Character</label>
                        <select name="lead_character" id="" class="form-control" required>
                            <option value="male">male</option>
                            <option value="female">female</option>
                            <option value="LGBTQI+">LGBTQI+</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lead College</label>
                        <select name="lead_college" id="" class="form-control" required>
                            <option value="Integrated School">Integrated School</option>
                            <option value="Berkeley">Berkeley</option>
                            <option value="Reagan">Reagan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tags</label>
                        <div class="tag-container"></div>
                        <input type="hidden" name="tags" class="tags" required>
                        <input type="text"  class="form-control tag-input">
                    </div>
                    <div class="form-group">
                        <label for="blurb">Blurb</label>
                        <textarea name="blurb" class="form-control" max="3000" placeholder="3000 characters only" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Book Cost</label>
                        <input type="number" class="form-control" value="6" max="10" required placeholder="GEM" name="cost">
                    </div>
                    <div class="form-group">
                        <label for="review_question_1">Review question 1</label>
                        <textarea name="review_question_1" class="form-control" max="150" placeholder="150 characters only" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="review_question_2">Review question 2</label>
                        <textarea name="review_question_2" class="form-control" max="150" placeholder="150 characters only" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="credit">Credits page</label>
                        <textarea name="credit" class="form-control" max="1000" placeholder="1000 characters only" required></textarea>
                    </div>
                    <button class="btn btn-block btn-primary">CREATE</button>
                </form>
            </div>
          </div>
    </div>
</div>
<script>
       let values = [];

    function remove(data){
        values = values.filter(function(e){
            return e != data;
        })
        $('.tag-container').html('');
        $('.tags').val(values.join(','));
        values.forEach(function(data){
            let newtag = $("<span class='badge badge-primary m-1 i-tag' onclick=\"remove('"+data+"')\"> "+data+"</span>");
            $('.tag-container').append(newtag);
        })
    }
   $(function(){
       $('.tag-input').keypress(function(e){
           console.log(e.charCode);
           if(e.code == "Enter" || e.code == 'Space' || e.charCode == 47 || e.charCode == 92 || e.charCode == 34||e.charCode == 39){
               if(values.length >= 10){
                    e.preventDefault();
                   alert('maximum of 10 tags only')
               }else {
                   if($(this).val().length != 0){
                    if(!values.includes($(this).val())){
                        e.preventDefault();
                        values.push($(this).val());
                        $('.tags').val(values.join(','));
                        $(this).val('')
                        $('.tag-container').html('');
                        values.forEach(function(data){
                            let newtag = $("<span class='badge badge-primary m-1 i-tag' onclick=\"remove('"+data+"')\"> "+data+"</span>");
                            $('.tag-container').append(newtag);
                        })
                    }else{
                        e.preventDefault();
                        alert('Tag is now encoded');
                    }
                   }else {
                    e.preventDefault();

                       alert('Type something..')
                       $('.tag-input').val('');

                   }
                    

                    
               }
                
           }
       })

   })
</script>
@endsection