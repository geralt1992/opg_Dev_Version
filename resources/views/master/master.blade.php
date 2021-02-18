<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moj Ćužpajz</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Styles  CSS-->
    <link href="{{asset('css/magnific-popup.css')}}" rel="stylesheet" type="text/css"/>


    <link href="{{asset('css/MAIN_page.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/categories.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/detail_search_page.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/opg.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/our_mission_page.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/product.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/review.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('css/user_profile.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/user_image.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/user_opg.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/user_opg_gallery.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/user_products.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/user_opg_favourites.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/user_products_favourites.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('css/footer_about_us.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/footer_conditions.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/footer_help.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('css/blog_all.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/blog.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('css/chat.css')}}" rel="stylesheet" type="text/css"/>

    <link href="{{asset('css/sidebar.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/navbar.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/footer.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- FONTOVI -->
    <link rel="stylesheet" href="https://use:fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Julius+Sans+One&family=Roboto+Slab:wght@400;531&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>







@include('sweetalert::alert')

@yield('content')

<!-- OGLAS -->
<script>
    let oglas = document.getElementById('oglas');
    oglas.addEventListener('click' , () => {
        oglas.style.display = "none";
    })
</script>


<script src="https://use.fontawesome.com/releases/v5.12.0/js/all.js" data-auto-replace-svg="nest"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- POP UP -->
<script type="text/javascript" src="http://dimsemenov-static.s3.amazonaws.com/dist/jquery.magnific-popup.min.js"></script>

<!-- AOS -->
<script rel="stylesheet" src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>AOS.init();</script>
<!-- PUSHER -->
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- COOKIE -->
<script>
    let store = localStorage;
        if(store.getItem('cookieDiscalaimer') === null){
            document.getElementById('wrap').style.display = 'block';
        }else{
            document.getElementById('wrap').style.display = 'none';
        }

    let btn = document.getElementById('dugme');
        btn.addEventListener('click' , cookieDis);
        function cookieDis(){
            let cookieDisclaimer = '';
            cookieDisclaimer = 'Prihvaćam uvjete korištenja i sve što ide s njima';
            store.setItem('cookieDiscalaimer' , cookieDisclaimer);
            document.getElementById('wrap').style.display = 'none';
        }
</script>

<script>
    $(function () {
    $(document).scroll(function () {
    var $nav = $(".navbar-fixed-top");
    $nav.toggleClass('scrolled', $(this).scrollTop() > 150);
    });
});
</script>

</body>
</html>
