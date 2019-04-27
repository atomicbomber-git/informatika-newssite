@extends('shared.guest-layout')
@section('title', 'Beranda')
@section('content')

<div class="ui container">
    <h1 class="ui header centered">
        Informatika News
        <div class="sub header">
            Sumber berita <strong> Teknik Informatika Untan </strong> terpercaya dan teraktual.
        </div>
    </h1>

    <div class="ui segment basic">
        <h2 class="ui header">
            Berita Terbaru
        </h2>
        
        <div class="ui segment items">
            @foreach ($artikels as $artikel)
            <div class="item">
                <div class="ui small image">
                    <img src="{{ route('artikel.main_image', $artikel) }}" alt="{{ $artikel->judul }}">
                </div>
                <div class="content">
                    <a class="header" href="{{ route("guest-artikel.show", $artikel) }}">
                        {{ $artikel->judul }}
                    </a>
                    <div class="meta">
                        {{ $artikel->created_at }}
                    </div>
                    <div class="description">
                        {{ \Illuminate\Support\Str::limit($artikel->deskripsi, 200) }}
                    </div>
                </div>
            </div>

            @if (!$loop->last)
            <div class="ui divider"> </div>
            @endif

            @endforeach
        </div>
    </div>
</div>

@endsection