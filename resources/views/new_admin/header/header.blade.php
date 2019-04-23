<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            @if(isset($company) && isset($company->img))
                <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('images/logo/' . $company->img) }}"
                                                                      alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{route('home')}}"><img
                        src="{{ asset('images/logo/' . $company->img) }}" alt="Logo"></a>
            @endif
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                @component('new_admin.header.search')
                @endcomponent

                @component('new_admin.header.notification')
                @endcomponent

                @component('new_admin.header.messages')
                @endcomponent

            </div>

            @component('new_admin.header.user_menu')
            @endcomponent

        </div>
    </div>
</header>
