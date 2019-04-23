@extends('shared.layout')
@section('title', 'Daftar artikel')
@section('content')

<div class="ui container">

    <h1 class="ui dividing header">
        <i class="newspaper icon"></i>
        Daftar Seluruh Artikel
    </h1>

    @include("shared.message")

    <div class="t-a:r">
        <a href="{{ route('artikel.create') }}" class="ui button tiny primary">
            <i class="plus icon"></i>
            Artikel Baru
        </a>
    </div>

    <div class="ui segments">
        <div class="ui segment">
            @foreach ($artikels as $artikel)
            <div class="ui items">
                <div class="item">
                    <div class="image">
                        <img src="" alt="">
                    </div>
    
                    <div class="content">
                        <a href="" class="header">
                            {{ $artikel->judul }}
                        </a>
                        
                        <div class="meta">
                            <span>
                                {{ $artikel->created_at }}
                            </span>
                        </div>
    
                        <div class="description">
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem dicta voluptates quasi exercitationem saepe nulla in maiores illo odio. Fugit sunt delectus vitae dolores eos autem fugiat facilis officia ex.
                            </p>
                        </div>
                            
                        <div class="extra">

                            <div class="t-a:r">
                                <form method="POST" action="{{ route("artikel.delete", $artikel) }}" class="ui form">
                                    @csrf
                                    <button class="ui button negative tiny">
                                        <i class="trash icon"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
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