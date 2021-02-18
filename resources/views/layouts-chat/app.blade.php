<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- FONTOVI -->
        <link rel="stylesheet" href="https://use:fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chat.css') }}" rel="stylesheet">
    <link href="{{asset('css/footer.css')}}" rel="stylesheet" type="text/css"/>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{route('show_main_page')}}">
                    Moj Ćužpajz - povratak
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Prijava') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registracija') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Odjava') }}
                                    </a>


                                    <a class="dropdown-item" href="{{ route('show_user_profile') }}">
                                        {{ __('Moj OPG') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

 <!-- RECAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js?render=6Leo88MZAAAAANfeoaqGpch-DK7CjKrAMLdTr3NJ"></script>

    <script>
        grecaptcha.ready(function () {
        grecaptcha.execute('6Leo88MZAAAAANfeoaqGpch-DK7CjKrAMLdTr3NJ', { action: 'contact' }).then(function (token) {
        var recaptcha_response = document.getElementById('recaptcha_response');
        recaptcha_response.value = token;
        });
        });
    </script>

    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<script>
    var reciever_id = '';
    var my_id = "{{Auth::id()}}";
    $(document).ready(function () {

        //ajax setup from csrf token
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

      var pusher = new Pusher('ead68957832159224fef', {
      cluster: 'eu',
      forceTLS: true,
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
   // alert(JSON.stringify(data));
        if(my_id == data.from) {
            $('#' + data.to).click();
        } else if(my_id == data.to) {
            if(reciever_id == data.from) {
                //if reciever is selected, reload the selected user...
                $('#' + data.from).click();
            } else {
                //if receiver is not selected, add notiffication for that user
                var pending = parseInt($('#' + data.from).find('.pending').html());

                if (pending) {
                    $('#' + data.from).find('.pending').html(pending + 1);
                } else{
                    $('#' + data.from).append('<span class="pending">1</span>');
                }
            }
        }
        });

        $('.user').click(function() {
            $('.user').removeClass('active');
            $(this).addClass('active');
            $(this).find('.pending').remove();

            reciever_id = $(this).attr('id');
            $.ajax({
                type: "GET",
                url: "message/" + reciever_id,
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });

        $(document).on('keyup' , '.input-text input' , function(e) {
            var message = $(this).val();
            //check if enter key is press and message is not null also rec id is selected  - && receiver_id != ''
            if(e.keyCode == 13 && message != '') {
               $(this).val(''); //while pressed enter text box will be empty
                var datastr = "reciever_id=" + reciever_id + "&message=" + message;
            //   alert(datastr);
                $.ajax({
                    type: "post",
                    url: "message",
                    data: datastr,
                    cache: false,
                    success: function (data) {
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
    });

    //make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }</script>

</body>
</html>
