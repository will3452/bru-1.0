@extends('layouts.parent')
<style>
    .float-box{
    width:8vh !important;height:8vh !important;position:fixed !important;bottom:1vh !important;right:1em !important;z-index:999 !important;
    transition:all 100ms;
    
}
.float-box1{
    width:8vh !important;height:8vh !important;position:fixed !important;bottom:11vh !important;right:1em !important;z-index:999 !important;
    transition:all 100ms;
    
}
.float-box2{
    width:8vh !important;height:8vh !important;position:fixed !important;bottom:21vh !important;right:1em !important;z-index:999 !important;
    transition:all 100ms;
    
}
</style>
@section('main_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="#" class="btn btn-primary d-flex justify-content-center align-items-center rounded-circle float-box" style="" title="create something"><i class="fa fa-plus"></i></a>
<a href="# " title="Upload artwork" class="btn btn-primary d-flex justify-content-center align-items-center rounded-circle float-box1"  style=""><i class="fa fa-paint-brush"></i></a>
<a href="{{route('books.create')}}" class="btn btn-primary d-flex justify-content-center align-items-center rounded-circle float-box2" style=""><i class="fa fa-pencil" title="Create Books"></i></a>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a href="{{ route('books.index') }}" class="nav-link">My Books</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>
</div>
<script>
    let ab = document.querySelector('.float-box1');
    let bb = document.querySelector('.float-box2');
    ab.classList.add('d-none');
    ab.classList.remove('d-flex');
    bb.classList.add('d-none');
    bb.classList.remove('d-flex');
    let fb = document.querySelector('.float-box');
    let isShow = false;
    fb.onclick = function(){
        if(!isShow){
            ab.classList.remove('d-none');
            ab.classList.add('d-flex');
            bb.classList.remove('d-none');
            bb.classList.add('d-flex');
            fb.innerHTML=`<i class="fa fa-close"></i>`;
        }else {
            ab.classList.add('d-none');
            ab.classList.remove('d-flex');
            bb.classList.add('d-none');
            bb.classList.remove('d-flex');
            fb.innerHTML=`<i class="fa fa-plus"></i>`;
        }
        isShow = !isShow;
    }
</script>
@endsection