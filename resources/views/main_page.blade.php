@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->
@include('navbar.navbar' , ['new_mes' => $new_mes])
<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="banner-area" id="banner">
    <div class="banner-wraper">
        <div class="banner-search">
            <form method="HEAD" action="{{route('show_search_results_main_search')}}">
                @csrf
                    <div class="form-col">
                        <div class="col">
                        <label for="main_search" data-aos="fade-down" data-aos-delay="300" data-aos-duration="1000"> PRONAĐI  PROIZVOD</label>
                        <input required type="text" id="main_search" name="main_search" class="form-control" placeholder="UNESI IME PROIZVODA">
                        </div>

                    <a href="{{route('show_search_choice')}}"> <i class="fas fa-search"></i> Detaljna Tražilica</a>

                    </div>
                    <div class="center">
                        <button type="submit" class="btn btn-danger"  data-aos="fade-up" data-aos-delay="100"   data-aos-once="true"  data-aos-duration="1000">PRETRAŽITE! </button>
                    </div>
                </form>
        </div>
    </div>

    <div id="oglas">
        <p class="pulse" id="oglas_text">Isprobaj online štand i podigni prodaju! <br><br> Potpuno besplatno do kraja 2021.</p>
    </div>
</section>

<!------------------------------------------------------------who_are_we---------------------------------------------------------->

<section class="menu" id="menu" >

    <div class="section-heading" style="margin-top:3rem;">
    <h2>Kupac ili prodavač?</h2>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6"  data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000" >
            @guest <a  href="{{ route('register') }}">  @endguest

            @auth <a  href="{{ route('show_user_products')}}">  @endauth

                @if(Auth::user())
                    @if(Auth::user()->is_owner === 'Kupac')
                    <a  href="{{ route('show_search_choice')}}">
                    @endif
                @endif

                    <div class="card green">
                        <div class="additional">
                            <div class="user-card">

                            </div>
                            <div class="more-info">
                                <h1>Za vlasnike OPG-a</h1>
                                <div class="coords">
                                    Klikni i započni prijavu svog OPG-a i proizvoda
                                </div>
                            </div>
                        </div>
                        <div class="general">
                            <h1>Za vlasnike OPG-a</h1>
                            <p>Putem Ćušpajz HR-a imate priliku ponuditi svoje domaće proizvode.</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6"  data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000" >
                <a  href="{{ route('show_search_choice') }}">
                    <div class="card green">
                        <div class="additional">
                            <div class="user-card">

                            </div>
                            <div class="more-info">
                                    <h1>Za Kupce</h1>
                                <div class="coords2">
                                    Klikni i započni kupovinu domaćih proizvoda
                                </div>
                            </div>
                        </div>
                        <div class="general">
                            <h1>Za Kupce</h1>
                            <p>Kupi domaće, jeftine i svježe proizvode naših poljoprivrednika! <br> <br>
                            Pomozi naše gospodarstvo!
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>


</section>


<!---------------------------------------------------------------------------------------------CATEGORIES---------------------------------------------------------------------------- -->

<section class="all_categories-area" id="all_categories-area" style="margin-top:6rem; background-color: #f4f4f4f4 !important; padding: 2rem;">
<div class="section-heading">
        <h2>Kategorije</h2>
        </div>

            <div class="section_s2">
                <div class="service-section">
                    <div class="container"  >
                    <hr>

                    <div class="row">

                    <div class="col-md-4"  data-aos="fade-down" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
                            <a href="{{route('show_categories' , [$category = 'voće'])}}">
                                <div class="single-service">
                                    <img src="{{asset('avatars/voce1.jpg')}}" alt="profile-picture">
                                    <div class="new">
                                    <h5>Voće</h5>
                                </div>
                                </div>
                            </a>
                            </div>

                            <div class="col-md-4"  data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
                            <a href="{{route('show_categories' , [$category = 'povrće'])}}">
                                <div class="single-service">
                                    <img src="{{asset('avatars/povrce1.jpg')}}" alt="profile-picture">
                                    <div class="new">
                                    <h5>Povrće</h5>
                                </div>
                                </div>
                            </a>
                            </div>

                            <div class="col-md-4"  data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
                            <a href="{{route('show_categories' , [$category = 'meso'])}}">
                                <div class="single-service">
                                    <img src="{{asset('avatars/meso.jpg')}}" alt="profile-picture">
                                    <div class="new">
                                    <h5>Meso</h5>
                                </div>
                                </div>
                            </a>
                            </div>

                            <div class="col-md-4"  data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
                            <a href="{{route('show_categories' , [$category = 'mliječni proizvodi'])}}">
                                <div class="single-service">
                                    <img src="{{asset('avatars/milk.jpg')}}" alt="profile-picture">
                                    <div class="new">
                                    <h5>Mliječni proizvodi</h5>
                                </div>
                                </div>
                            </a>
                            </div>

                            <div class="col-md-4"  data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
                            <a href="{{route('show_categories' , [$category = 'sokovi'])}}">
                                <div class="single-service">
                                    <img src="{{asset('avatars/sok1.jpg')}}" alt="profile-picture">
                                    <div class="new">
                                    <h5>Sokovi</h5>
                                </div>
                                </div>
                            </a>
                            </div>

                            <div class="col-md-4"  data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
                            <a href="{{route('show_categories' , [$category = 'ulja'])}}">
                                <div class="single-service">
                                    <img src="{{asset('avatars/ulje3.jpg')}}" alt="profile-picture">
                                    <div class="new">
                                    <h5>Ulja</h5>
                                </div>
                                </div>
                            </a>
                            </div>

                            <div class="col-md-4"  data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
                            <a href="{{route('show_categories' , [$category = 'alkoholna pića'])}}">
                                <div class="single-service">
                                    <img src="{{asset('avatars/wine.jpg')}}" alt="profile-picture">
                                    <div class="new">
                                    <h5>Alkoholna pića</h5>
                                </div>
                                </div>
                            </a>
                            </div>

                            <div class="col-md-4"  data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
                            <a href="{{route('show_categories' , [$category = 'orašasti plodovi'])}}">
                                <div class="single-service">
                                    <img src="{{asset('avatars/orah.jpg')}}" alt="profile-picture">
                                    <div class="new">
                                    <h5>Orašasti plodovi</h5>
                                </div>
                                </div>
                            </a>
                            </div>

                            <div class="col-md-4"  data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
                            <a href="{{route('show_categories' , [$category = 'ostalo'])}}">
                                <div class="single-service">
                                    <img src="{{asset('avatars/ostalo.jpg')}}" alt="profile-picture">
                                    <div class="new">
                                    <h5>Ostali proizvodi</h5>
                                </div>
                                </div>
                            </a>
                            </div>

                        </div>
                        <hr>
                    </div>

                </div>

            </div>
</section>


<!---------------------------------------------------------------------------------------------sponsori---------------------------------------------------------------------- -->


<!---------------------------------------------------------------------------------------------BLOG---------------------------------------------------------------------- -->
<section class="blog" id="blog" style="margin-top: 12rem;">

    <div class="section-heading">
        <h2>Posjetite naš blog</h2>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000">
    <hr>
        <div class="row">

    @if(is_array($blogs) || is_object($blogs))
    @foreach($blogs as $blog)
            <div class="card">
                <div class="image-data secret_for_mobile">
                <img src="{{url('avatars/' .$blog->blog_avatar)}}" alt="blog_avatar" class="background-image">
                    <div class="publication-details">
                    <a href="{{route('blog_all')}}" class="author"> <i class="fas fa-user"></i> Marin Sabljo  </a>
                        <span style="background-color:transparent;" class="date"> <i class="fas fa-calendar-alt"></i> {{ Carbon\Carbon::parse($blog->created_at)->format('d, m, Y') }}</span>
                    </div>
                </div>
                <div class="post-data">
                <h1 class="title">{{$blog->blog_title}}</h1>
                            <h2 class="subtitle">Pročitajte naš novi blog</h2>
                            <p class="descreption"> {{ \Illuminate\Support\Str::limit($blog->blog_content, 300, '...') }}</p>
                            <div class="cta">
                            <a href="{{route('show_blog' ,  [$blog->id ])}}">Pročitaj više &rarr;</a>
                    </div>
                </div>
            </div>
    @endforeach
    @endif
<hr>
        </div>
        <hr>
    </div>
</section>



<div id="wrap" class="js-cookie-banner" data-aos="fade-right"data-aos-offset="300" data-aos-easing="ease-in-sine" style="z-index: 999;">
    <p  class="conditions_text">Ova web stranica koristi kolačiće kako bi osigurala najbolje iskustvo na našoj web stranici <a href="{{route('show_conditions')}}"> Saznajte više </a>
        <button class="btn-danger rounded js-cookie-dismiss" id="dugme" style="float:right;">Slažem se</button>
    </p>
</div>


@include('footer.footer_main')
@endsection
