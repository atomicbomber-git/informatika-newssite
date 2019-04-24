@extends('shared.layout')

@section('main-content')
    @include('shared.guest-navbar')
    <div class="ui sidebar inverted vertical menu">
        <a class="item">
            One
        </a>
        <a class="item">
            Two
        </a>
        <a class="item">
            Three
        </a>
    </div>

    <div class="pusher">
        <div style="height: 50px"> </div>
        @yield('content')
        <div style="height: 30px"> </div>
    </div>
@endsection