@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->

@include('navbar.navbar')

<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="our_mission_banner" id="our_mission_banner">
    <div class="title">POMOZITE NAM ODRŽATI STRANICU</div>
</section>

<!---------------------------------------------------------------------------------------------SEARCH------------------------------------------------------------------ -->
<section class="our_mission" id="our_mission" style=" height: 90vh;">
    <div class="content">
        <div class="row">
            <div class="col-md-12" style="font-family:'Julius Sans One', sans-serif;">
              <h2> Poštovani korisnici,</h2> <br>
               imamo jednu molbu za Vas, a ona se sastoji u vidu pomoći. <br> <br>
               Naime, Ćušpajz.hr je aplikacija osnovana i zamišljena da pomogne Vama da lakše dođete do željenih proizvoda te da imate mogućnost plasirati svoje proizvode
               potencijalnim kupcima. <br> <br>
               Ćušpajz.hr je zamišljen kao, neprofitni projekt, razvijen od strane samoukog mladog web programera.<br>
               S obzirom da najam servera, kupovina domene i web servisa ("third partya") te online oglašavanje i promidžba koštaju,
               ukoliko Vam aplikacija koristi,  molim Vas da ju podržite s donacijom - <b>visina donacije po Vašem izboru!</b>  <br>
               Naravno ovo je zamolba za pomoć i neovisno o eventualnoj donaciji, aplikacija i sav njen sadržaj u pravilu su i dalje BESPLATNI! <br><br><br>

              <p class="d-flex justify-content-center"> Pomoći nam možete donacijama putem servisa <b>(kliknite na ikonu):</b> </p>
               <ul class="d-flex justify-content-between" style="padding: 50px; ">
                    <li> <a href="https://www.patreon.com/cuspajz" target="_blank;"><img src="{{asset('avatars/pateron_logo.png')}}"style="width: 150px; height:150px; border-radius:50%;" alt="cuspajz_donation_logo1"> </a> <br><br>Moj profil</li>
                </ul>

            </div>


        </div>
    </div>
</section>


<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->
@include('footer.footer_all_other')

@endsection
