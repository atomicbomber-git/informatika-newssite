<div class="ui inverted top fixed small menu">
    <div class="ui container">

        @include("shared.admin-brand-menu-item")

        @can("index", \App\Artikel::class)
        <a class="item {{ Route::is("artikel.*") ? "active" : "" }}" href="{{ route('artikel.index') }}">
            <i class="newspaper icon"></i>
            Artikel
        </a>
        @endcan

        <div class="right menu">
            @auth
            <div class="item">
                <form method="POST" action="{{ route("logout") }}" class="ui form">
                    @csrf
                    <div class="t-a:r">
                        <button class="ui button negative tiny">
                            <i class="sign out alternate icon"></i>
                            Keluar
                        </button>
                    </div>
                </form>
            </div>
            @endauth
        </div>
    </div>
</div>