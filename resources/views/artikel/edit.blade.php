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
        <form method="POST" enctype="multipart/form-data" action="{{ route("artikel.update", $artikel) }}" class="ui form">
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

            <div class="field{{ $errors->has("gambar") ? " error" : "" }}">
                <label> Gambar Utama: </label>

                <div class="ui segment label yellow m-t:10">
                    <i class="warning icon"></i>
                    Kosongkan kolom di bawah ini jika Anda tidak ingin mengganti gambar yang telah ada.
                </div>

                <input name="gambar" value="{{ old("gambar") }}" placeholder="Gambar Utama" type="file" accept="img/*">
                @error("gambar")
                <div class="ui pointing red basic label">
                    {{ $errors->first("gambar") }}
                </div>
                @enderror
            </div>

            <div class="field">
                <label> Gambar Sekarang: </label>

                <div class="ui medium image">
                    <img src="{{ route("artikel.main_image", $artikel) }}" alt="{{ $artikel->judul }}">
                </div>
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

@push('extra-scripts')
<script>
    $(document).ready(function() {
        $("#isi").summernote({
            height: window.summernote_height
        })
    })
</script>
@endpush