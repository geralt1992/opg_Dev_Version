@extends('master.master')
@section('content')
<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->
@include('navbar.navbar')
<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->
<section class="about_us_banner" id="about_us_banner">
    <div class="title">O NAMA</div>
</section>

<!---------------------------------------------------------------------------------------------SEARCH------------------------------------------------------------------ -->
<section class="who_are_we" id="who_are_we">

    <div class="section-heading" style="margin-top:2rem;">
    <h2>Tko smo mi?</h2>
    </div>

    <div class="container py-7">
  
  <hr class="hr-primary w-15 hr-xl ml-0 mb-5">
  
  
  <div class="row mb-5">
    <div class="col-md-6 order-md-2">
    <div class="svg_img" style="height:300px" data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000" >
    @include('svgs.us')
    </div>
    </div>
    <div class="col-md-6 flex-valign text-md-right">
      <h3 class="text-uppercase text-letter-spacing-xs mt-0 mb-1 text-dark font-weight-bold ">
      Tko smo mi?
      </h3>
      <h5 class="my-0 font-weight-normal">
      <em><b>Ponudite svoje domaće prehrambene proizvode</b></em>
      </h5>
      <hr class="hr-primary w-70 ml-0 ml-md-auto mr-md-0 mb-3">
      <p style="text-align: left;">Ćušpajz. HR je internetska aplikacija nastala sa željom da pomogne Vama, našim graĐanima!</p>
      <p style="text-align: left;">Bilo da ste vlasnik OPG-a ili kupac - Ćušpajz.hr Vam može biti od koristi!</p>
      <p style="text-align: left;"> Ćušpajz.hr ima za cilj objediniti naše OPG-ove skupa
          s njihovim proizvodima te omogućiti KUPCIMA da na lagan način dođu do željenih proizvoda, bilo na 
          lokalnoj i/ili regionalnoj razini!
      </p>
      </div>
  </div>

  <div class="row mb-5">
    <div class="col-md-6 text-md-right">
        <div class="svg_img"style="height:300px" data-aos="fade-right" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000" >
    @include('svgs.busniess')
    </div>
     </div>
    <div class="col-md-6 flex-valign">
      <h3 class="text-uppercase text-letter-spacing-xs mt-0 mb-1 text-dark font-weight-bold">
      Što nam je cilj?
      </h3>
      <h5 class="my-0 font-weight-normal">
      <em><b>Brz i dostupan pregled svih domćaih proizvoda!</b></em>
      </h5>
      <hr class="hr-primary w-70 ml-0 mb-3">
      <p>Omogućiti VLASNICIMA OPG-ova da se slobodno oglašavaju te da ponude svoje proizvode</p>
      <p>Omogućiti KUPCIMA da PROVJERE nalaze li se vlasnici obiteljskih gospodarstva u njihovoj blizini, omogućiti im da stupite u kontakt s njima te 
          da kupe njihove proizvode
      </p>
      <p>JEDNOSTAVAN pristup svim domaćih proizvodima na razini RH!</p>
      <p>Pomoć našim poljeprivrednicima!</p>
      <p>Ostaviti pozitivan utjecaj na NAŠE gospodarstvo</p>
    </div>
  </div>


  <div class="row mt-5">
    <div class="col-md-6 order-md-2">
    <div class="svg_img" style="height:300px"data-aos="fade-left" data-aos-delay="300"   data-aos-once="true"  data-aos-duration="1000" >
    @include('svgs.advertisement')
    </div>
    </div>
    <div class="col-md-6 flex-valign text-md-right">
      <h3 class="text-uppercase text-letter-spacing-xs mt-0 mb-1 text-dark font-weight-bold">
      Kako se oglašavati i/ili kupovati?
      </h3>
      <h5 class="my-0 font-weight-normal">
       <em><b>Pratite blog i priključite se forumu!</b></em>
      </h5>
      <hr class="hr-primary w-70 ml-0 ml-md-auto mr-md-0 mb-3">
      <p style="text-align: left;"> <b> <span class="tips"  style="color:red; font-size:20px;">KORAK 1:</span> </b>Registriraj se kao <b>VLASNIK OPG-a ili</b> kao <b>KUPAC!</b></p>
      <p style="text-align: left;"> <b> <span class="tips"  style="color:red; font-size:20px;">KORAK 2:</span> </b>VLASNICI OPG-A u dva klika <b>napravite svoj E-OPG!</b></p>
      <p style="text-align: left;"> <b> <span class="tips"  style="color:red; font-size:20px;">KORAK 3:</span> </b><b>Prodaj ili kupi domaće, zdrave i povoljne proizvode</b></p>
      <p style="text-align: left;"> <b> <span class="tips"  style="color:red; font-size:20px;">BONUS:</span> </b>Recenziraj OPG-ove, napravi listu favorita i njihovih proizvoda te prati naš blog!</p>
    </div>
  </div>
  <hr class="hr-primary w-15 hr-xl ml-0 mb-5">
  
  
</div>

</section>

@include('footer.footer_all_other')

@endsection

