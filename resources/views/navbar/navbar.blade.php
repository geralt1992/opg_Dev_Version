<header class="navbar-fixed-top" >
<a href="{{route('show_main_page')}}" id="logo"><span style='color: #D92139;  text-decoration: overline;'>ćUšPAJZ</span> <span style='color: white; text-decoration: underline;'>HR </span></a>

    <nav >
       <i id="menu-icon" class="fas fa-bars" style="color:white !important; "></i>
        <ul>
        <li ><a href="{{route('show_donation_page')}}">Pomozite nam!</a></li>
      @isset($new_mes)
        @if($new_mes)
        <li>
            <a href="{{route('chat_all')}}" > <i style="display:inline; color:red;" class="fa fa-comments" aria-hidden="true"></i></a>
        </li>
        @endif
    @endisset
           @guest
        <li><a href="{{ route('register') }}">{{ __('Registracija') }}</a></li>
        @if (Route::has('register'))
        <li><a  class="prijava_gumb" href="{{ route('login') }}">{{ __('Prijava') }}</a></li>
        @endif
    @else
        <li><a href="{{route('show_user_profile')}}" class="user_name_nav_bar"> {{ Auth::user()->name }}</a>


            <a class="odjava_gumb"href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"
                    onMouseOver="this.style.color='#ffff'">
                    {{ __('Odjava') }}
            </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        </li>
    @endguest
        </ul>
    </nav>
</header>
