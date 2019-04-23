@extends('shared.layout')
@section('title', 'Sunting Artikel')
@section('content')

<div class="ui container">
    <div class="ui segment">
        <div class="ui small breadcrumb">
            <a class="section">
                {{ config("app.name") }}
            </a>
            <i class="right chevron icon divider"></i>

            <a class="section" href="{{ route("artikel.index") }}">
                Artikel
            </a>
            <i class="right chevron icon divider"></i>

            <div class="active section">
                Sunting Artikel
            </div>
        </div>
    </div>

    <h1 class="ui header dividing">
        <i class="icon pencil"></i>
        Sunting Artikel
    </h1>

    @include("shared.message")

    <div class="ui segment">
        <form method="POST" action="{{ route("artikel.update", $artikel) }}" class="ui form">
            @csrf

            <div class="field{{ $errors->has("judul") ? " error" : "" }}">
                <label> Judul: </label>
                <input name="judul" value="{{ old("judul", $artikel->judul) }}" placeholder="Judul" type="text">
                @error("judul")
                <div class="ui pointing red basic label">
                    {{ $errors->first("judul") }}
                </div>
                @enderror
            </div>

            <div class="field{{ $errors->has("deskripsi") ? " error" : "" }}">
                <label> Deskripsi: </label>
                <textarea name="deskripsi" col="30" row="10" placeholder="Deskripsi">{{ old("deskripsi", $artikel->deskripsi) }}</textarea>
                @error("deskripsi")
                <div class="ui pointing red basic label">
                    {{ $errors->first("deskripsi") }}
                </div>
                @enderror
            </div>

            <div class="field{{ $errors->has("isi") ? " error" : "" }}">
                <label> Isi: </label>
                <textarea name="isi" id="isi" col="30" row="10" placeholder="Isi">{{ old("isi", $artikel->isi) }}</textarea>
                @error("isi")
                <div class="ui pointing red basic label">
                    {{ $errors->first("isi") }}
                </div>
                @enderror
            </div>

           <div class="t-a:r">
              <button class="ui button primary">
                  <i class="pencil icon"></i>
                  Ubah Artikel
              </button>
           </div>
        </form>
    </div>
</div>

@endsection

@section('extra-scripts')
<script>
    $(document).ready(function() {
        $("#isi").summernote({
            height: window.summernote_height
        })
    })
</script>
@endsection