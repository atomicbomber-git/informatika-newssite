@extends('shared.admin-layout')
@section('title', 'Baca Artikel')
@section('content')

<div class="ui container">
    {{-- <div class="ui segment">
        <div class="ui small breadcrumb">
            <a class="section" href="{{ url("") }}">
                {{ config("app.name") }}
            </a>

            <i class="right chevron icon divider"></i>
            <a class="section" href="{{ route("artikel.index") }}">
                Artikel
            </a>

            <i class="right chevron icon divider"></i>
            <div class="section active">
                Baca Artikel
            </div>
        </div>
    </div> --}}

    <h1 class="ui dividing header">
        {{ $artikel->judul }}
        <div class="sub header">
            {{ $artikel->created_at }}
        </div>
    </h1>

    <div class="ui image">
        <img src="{{ route("artikel.main_image", $artikel) }}" alt="{{ $artikel->judul }}">
    </div>

    <div class="ui segment">
        <div class="m-t:5">
            {!! $artikel->isi !!}
        </div>
    </div>
</div>

@endsection