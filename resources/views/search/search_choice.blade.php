@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->

@include('navbar.navbar')

<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="search_banner" id="search_banner">
    <div class="title">Usmjeri pretragu</div>
    </section>

<!---------------------------------------------------------------------------------------------SEARCH------------------------------------------------------------------ -->
<section class="search_choice" >




<section class="menu" id="menu">

    <div class="section-heading subtitle" style="margin-top:4rem;">
    <h1>Želim pretražiti...</h1>
    </div>


    <div class="container">
        <div class="row"  style="margin-top:5rem;">

            <div class="col-md-6"  data-aos="fade-right" data-aos-delay="100"   data-aos-once="true"  data-aos-duration="600" >
                <a href="{{route('show_opg_search')}}">
                    <div class="card green">
                        <div class="additional">
                            <div class="user-card">
                            </div>
                            <div class="more-info">
                                <h1>OPG-ove</h1>
                                <div class="coords">
                                    Klikni i započni pretragu
                                </div>
                            </div>
                        </div>
                        <div class="general">
                        <h1>OPG-ove</h1>
                            <p>Pretražite OPG-ove i saznajte ima li koji u Vašoj blizini.</p>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-md-6"  data-aos="fade-left" data-aos-delay="100"   data-aos-once="true"  data-aos-duration="600" >
            <a href="{{route('show_products_search')}}">
                    <div class="card green">
                        <div class="additional">
                            <div class="user-card">
                            </div>
                            <div class="more-info">
                                    <h1>Njihove proizvode</h1>
                                <div class="coords2">
                                Klikni i započni pretragu
                                </div>
                            </div>
                        </div>
                        <div class="general">
                        <h1>Njihove proizvode</h1>
                            <p>Pronađi domaće, jeftine, svježe i kvalitetne proizvode naših poljoprivrednika! <br>
                          
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
</section>

<style>






</style>
<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->
@include('footer.footer_all_other')

@endsection
