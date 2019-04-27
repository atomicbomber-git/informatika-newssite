@extends('shared.admin-layout')
@section('title', 'Artikel Baru')
@section('content')

<div class="ui container">

    <div class="ui segment">
        <div class="ui small breadcrumb">
            <a class="section">
                {{ config("app.name") }}
            </a>
            <i class="right chevron icon divider"></i>

            <a class="section" href="{{ route('artikel.index') }}">
                Artikel
            </a>
            <i class="right chevron icon divider"></i>

            <div class="active section">
                Artikel Baru
            </div>
        </div>
    </div>

    <h1 class="ui dividing header">
        <i class="plus icon"></i>
        Artikel Baru
    </h1>

    <div class="ui segment">
        <form method="POST" enctype="multipart/form-data" action="{{ route("artikel.store") }}" class="ui form">
            @csrf

            <div class="field{{ $errors->has("judul") ? " error" : "" }}">
                <label> Judul: </label>
                <input name="judul" value="{{ old("judul") }}" placeholder="Judul" type="text">
                @error("judul")
                <div class="ui pointing red basic label">
                    {{ $errors->first("judul") }}
                </div>
                @enderror
            </div>

            <div class="field{{ $errors->has("gambar") ? " error" : "" }}">
                <label> Gambar Utama: </label>
                <input name="gambar" value="{{ old("gambar") }}" placeholder="Gambar Utama" type="file" accept="img/*">
                @error("gambar")
                <div class="ui pointing red basic label">
                    {{ $errors->first("gambar") }}
                </div>
                @enderror
            </div>

            <div class="field{{ $errors->has("deskripsi") ? " error" : "" }}">
                <label> Deskripsi: </label>
                <textarea name="deskripsi" col="30" row="10" placeholder="Deskripsi">{{ old("deskripsi") }}</textarea>
                @error("deskripsi")
                <div class="ui pointing red basic label">
                    {{ $errors->first("deskripsi") }}
                </div>
                @enderror
            </div>

            <div class="ui field{{ $errors->has("isi") ? " error" : "" }}">
                <label for="isi"> Isi: </label>
                <textarea name="isi" id="isi" cols="30" rows="10">{{ old("isi") }}</textarea>
                @error("isi")
                <div class="ui pointing red basic label">
                    {{ $errors->first("isi") }}
                </div>
                @enderror
            </div>
            
           <div class="t-a:r">
              <button class="ui button primary">
                  <i class="plus icon"></i>
                  Tambah Artikel Baru
              </button>
           </div>
        </form>
    </div>
</div>

@endsection

@push('extra-scripts')
<script>

$(document).ready(function() {
    tinyMCE.init({
        selector: '#isi',
        body_class: 'tinymce-editor',
        plugins: 'lists,image,imagetools',
        image_caption: true,
        file_picker_callback: window.tinymce_file_picker_callback,
        height: 400,
        toolbar: [
            'undo redo | styleselect | bold italic | numlist bullist | alignleft aligncenter alignright | image'
        ],
        content_css: '{{ asset('css/app.css') }}',
    })
    .then(editors => {
        editors[0].setContent(`{!! old('isi') !!}`)
    })
})

</script>
@endpush