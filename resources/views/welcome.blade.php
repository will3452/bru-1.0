@extends('layouts.app')

@section('content')
   @auth
    <div class="jumbotron">
        <h1 class="display-4">Multiverse</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, temporibus quis nulla fugiat tempora soluta dolorum perspiciatis sunt veniam est!</p>
        <hr class="my-4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, harum.</p>
        <p class="lead">
        <a class="btn btn-primary btn-lg" href="/home" role="button">Go back to Dashboarrd</a>
        </p>
    </div>
   @endauth
   @guest
    <div class="jumbotron">
        <h1 class="display-4">Multiverse</h1>
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, temporibus quis nulla fugiat tempora soluta dolorum perspiciatis sunt veniam est!</p>
        <hr class="my-4">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et, harum.</p>
        <p class="lead">
        <a class="btn btn-primary btn-lg" href="/login" role="button">Sign in</a>
        <a class="btn btn-primary btn-lg" href="/register" role="button">Register</a>
        </p>
    </div>
   @endguest
@endsection