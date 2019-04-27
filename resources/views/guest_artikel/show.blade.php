@extends('shared.guest-layout')
@section('title', 'Baca Artikel')
@section('content')

<div class="ui container">
    <h1 class="ui dividing header">
        {{ $artikel->judul }}
        <div class="sub header">
            {{ $artikel->created_at }}
        </div>
    </h1>

    <div class="ui image">
        <img src="{{ route("artikel.main_image", $artikel) }}" alt="{{ $artikel->judul }}">
    </div>

    <div class="ui segment" id="artikel">
        <div class="m-t:5">
            {!! $artikel->isi !!}
        </div>
    </div>
</div>

@endsection

@push("extra-scripts")
<script src="//code.responsivevoice.org/responsivevoice.js?key=0beyBZkI"></script>

<script>

$(document).ready(function() {
    $("#artikel p").each(function (index, elem) {
        let button = $(`
            <div class='t-a:r m-b:2'>
                <button class='ui icon button red'>
                    <i class='icon play'></i>
                </button>
            </div>
        `)

        $(button).click(function() {
            let text = $(elem).text()

            $.post("http://nlp-service.democlient.club/", { text: text })
                .done(response => {
                    responsiveVoice.speak(response.data.text, "Indonesian Female");
                })
                .fail((xhr, status, error) => {
                    let response = JSON.parse(xhr.responseText);
                });
        })

        let container = $(`
            <div> </div>
        `)

        $(container).insertAfter(elem)
        $(elem).appendTo(container)
        $(button).insertAfter(elem)
    })
})

</script>
@endpush