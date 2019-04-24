@extends('shared.layout')

@section('main-content')
    @include('shared.navbar')

    <div style="height: 100px">
        {{-- A space --}}
    </div>

    @yield('content')

    <div style="height: 30px">
        {{-- A space --}}
    </div>
@endsection