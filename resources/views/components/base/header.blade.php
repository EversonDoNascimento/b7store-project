<header>
    <div class="header-area">
    <a href="/" class="header-area-left">B7Store</a>
    <div class="header-area-right">
        @if (Auth::check())
            <a href="{{route('dashboard.my_account')}}"  class="my-account">
            <img src="assets/icons/userIcon.png" />
            Minha Conta
            </a>
        
        @else
            <a href="{{route('auth.login')}}"  class="my-account">
            <img src="{{asset('assets/icons/userIcon.png')}}" />
            Login
            </a>
        @endif
        <a href="" class="announce-now">Anunciar agora →</a>
        <img class="menu-icon" src="assets/icons/menuIcon.png" alt="Menu" />
        <div class="menu-mobile">
        <a href="{{route('dashboard.my_account')}}" class="my-account-mobile">
            <img src="assets/icons/userIcon.png" alt="Ícone do usuário" />
            Minha Conta
        </a>
        <a class="my-account-mobile" href="{{route('auth.logout')}}">
            ><img src="assets/icons/logoutIcon.png" /> Sair</a
        >
        </div>
    </div>
    </div>
</header>