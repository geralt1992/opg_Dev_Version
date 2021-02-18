@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->
@include('navbar.navbar')
<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="categories_banner" id="categories_banner">
  <div class="title">KATEGORIJA XY</div>
</section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->

<section class="pt-5 pb-5 user_messages" id="user_messages">
    <div class="container">
        <div class="row">
                    @include('user_sidebar.sidebar')
           NAPRAVI PORUKE
        </div>
    </div>
</section>
<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->
@include('footer.footer_all_other')

@endsection
