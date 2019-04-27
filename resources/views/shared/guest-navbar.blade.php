<div class="ui grid">
    <div class="tablet computer only row">
        <div class="column">
            <div class="ui inverted huge menu">
                <div class="ui container">
                    @include("shared.guest-brand-menu-item")
                    <a class="item {{ Route::is("guest.home.*") ? "active" : "" }}" href="{{ route("guest.home.show") }}">
                        <i class="icon home"></i>
                        Beranda
                    </a>
                    {{-- <a class="item">
                        <i class="icon newspaper"></i>
                        Artikel
                    </a> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Menu for mobile devices or tablets --}}
    <div class="mobile only row">
        <div class="column">
            @include("shared.guest-brand-menu-item")
            <div class="ui inverted small pointing menu">
                <div class="right menu">
                    <div class="ui item" id="sidebar-toggle">
                        <i class="bars icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('extra-scripts')
<script>
    $('#sidebar-toggle').click(function() {
        $('.ui.sidebar').sidebar('toggle')
    })
</script>
@endpush