@extends('shared.guest-layout')
@section('title', 'Baca Artikel')
@section('content')

<div class="ui container">
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
            <button id="tts-play" data-state="stopped" class='ui icon button green'>
                <span class="label"> Play Text to Speech </span>
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

function showPauseButton() {
    let play_pause_button = $("#tts-play")
    play_pause_button
        .toggleClass("green", false)
        .toggleClass("red", true)

    play_pause_button.find("span.label").text("Pause Text to Speech")
    play_pause_button.find("i.icon")
        .toggleClass("play", false)
        .toggleClass("pause", true)
}

function showPlayButton() {
    let play_pause_button = $("#tts-play")
    play_pause_button
        .toggleClass("green", true)
        .toggleClass("red", false)

    play_pause_button.find("span.label").text("Play Text to Speech")
    play_pause_button.find("i.icon")
        .toggleClass("play", true)
        .toggleClass("pause", false)
}

function playTTS() {
    let text_list = []
    $("#artikel *").each(function (index, elem) {
        text_list.push( $(elem).text().trim() )
    })

    function textToSpeech(text_list, counter, finish_cb) {
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
                            else {
                                finish_cb()
                            }
                        }
                    }
                );
            })
            .fail((xhr, status, error) => {
                let response = JSON.parse(xhr.responseText);
            });
    }

    textToSpeech(text_list, 0, function() {
        showPlayButton()
        $("#tts-play").data("state", "stopped")
    })
}

$(document).ready(function() {
    
    window.setTimeout(responsiveVoice.speak($("#title").text().trim(), "Indonesian Female"), 1000)

    $("#tts-play").click(function() {
        switch($(this).data("state")) {
            case "stopped":
                playTTS()
                showPauseButton()
                $(this).data("state", "playing")
                break;
            case "playing":
                responsiveVoice.pause()
                showPlayButton()
                $(this).data("state", "paused")
                break;
            case "paused":
                responsiveVoice.resume()
                showPauseButton()
                $(this).data("state", "playing")
                break;
        }
    })
})

</script>
@endpush