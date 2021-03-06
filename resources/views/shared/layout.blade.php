<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        {{ config('app.name') }} - @yield("title")
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @yield('main-content')

    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @push("extra-scripts")
    <script>
        $('.message .close')
            .on('click', function() {
                $(this)
                .closest('.message')
                .transition('fade');
            });

        $(".form.confirmed")
            .submit(function (e) {
                e.preventDefault();

                window.swal({
                    "icon": "warning",
                    "text": "Apakah Anda yakin Anda ingin melakukan tindakan ini?",
                    "dangerMode": true,
                    "buttons": ["Tidak", "Ya"]
                })
                .then(is_ok => {
                    if (is_ok) {
                        $(this).off("submit")
                            .submit()
                    }
                })
            })
    </script>
    @endpush

    @stack("extra-scripts")
</body>
</html>