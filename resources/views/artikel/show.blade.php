@extends('shared.admin-layout')
@section('title', 'Baca Artikel')
@section('content')

<div class="ui container">
    <div class="ui segment">
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
    </div>

    <h1 class="ui dividing header">
        <span id="title"> {{ $artikel->judul }} </span>
        <div class="sub header">
            {{ $artikel->created_at }}
        </div>
    </h1>

    <div class="ui image">
        <img src="{{ route("artikel.main_image", $artikel) }}" alt="{{ $artikel->judul }}">
    </div>

    <div class="ui segment">

        <div class='t-a:r m-b:2'>
            <button id="tts-play" class='ui icon button red'>
                Text to Speech
                <i class='icon play'></i>
            </button>
        </div>

        <div class="m-t:5" id="artikel">
            {!! $artikel->isi !!}
        </div>
    </div>
</div>

@endsection

@push("extra-scripts")
<script src="//code.responsivevoice.org/responsivevoice.js?key=0beyBZkI"></script>

<script>

$(document).ready(function() {
    $("#tts-play").click(function() {
        
        let text_list = []
        text_list.push($("#title").text().trim())
        $("#artikel *").each(function (index, elem) {
            text_list.push( $(elem).text().trim() )
        })

        function textToSpeech(text_list, counter) {
            $.post("https://nlp-service.democlient.club/", { text: text_list[counter] })
                .done(response => {
                    responsiveVoice.speak(
                        response.data.text,
                        "Indonesian Female",
                        {
                            onend: function() {
                                counter++
                                if (counter < text_list.length) {
                                    textToSpeech(text_list, counter)
                                }
                            }
                        }
                    );
                })
                .fail((xhr, status, error) => {
                    let response = JSON.parse(xhr.responseText);
                });
        }

        textToSpeech(text_list, 0)
    })
})

</script>
@endpush