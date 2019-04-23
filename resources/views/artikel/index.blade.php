@extends('shared.layout')
@section('title', 'Daftar artikel')
@section('content')

<div class="ui container">
    <div class="ui segment">
        <div class="ui small breadcrumb">
            <a class="section" href="{{ url("") }}">
                {{ config("app.name") }}
            </a>

            <i class="right chevron icon divider"></i>
            <div class="active section">
                Artikel
            </div>
        </div>
    </div>

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
                    {{-- <div class="image">
                        <img src="" alt="">
                    </div> --}}
    
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
                            {{ $artikel->deskripsi }}
                        </div>
                        
                        <div class="extra">
                            <div class="t-a:r">
                                <a class="ui button tiny" href="{{ route("artikel.edit", $artikel) }}">
                                    <i class="pencil icon"></i>
                                    Sunting
                                </a>

                                <form method="POST" action="{{ route("artikel.delete", $artikel) }}" class="ui form d:i-b">
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

    <div class="ui center aligned container">
        {{ $artikels->links() }}
    </div>

</div>

@endsection