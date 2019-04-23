@extends('shared.layout')
@section('title', 'Artikel Baru')
@section('content')

<div class="ui container">
    <h1 class="ui dividing header">
        <i class="plus icon"></i>
        Artikel Baru
    </h1>

    <div class="ui segment">
        <form method="POST" action="{{ route("artikel.store") }}" class="ui form">
            @csrf

            <div class="field{{ $errors->has("judul") ? " error" : "" }}">
                <label> Judul: </label>
                <input name="judul" placeholder="Judul" type="text">
                @error("judul")
                <div class="ui pointing red basic label">
                    {{ $errors->first("judul") }}
                </div>
                @enderror
            </div>

            <div class="ui field">
                <label for="isi"> Isi: </label>
                <textarea name="" id="isi" cols="30" rows="10"></textarea>
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

@section('extra-scripts')
<script>
    $(document).ready(function() {
        $("#isi").summernote({
            height: 400
        });
    })
</script>
@endsection