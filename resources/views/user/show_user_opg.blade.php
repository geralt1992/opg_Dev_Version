@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->
@include('navbar.navbar')
<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->


<section class="user_main_banner" id="user_main_banner">
@isset($user_firm)
    <div class="title">{{$user_firm->firm_name}}</div>
@endisset
 </section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
<section class="pt-5 pb-5 opg" id="opg">
  <div class="container">
      <div class="row">
                @include('user_sidebar.sidebar')

                @isset($create_ur_firm)
                    <a href="{{route('create_opg')}}"style="color:balck; font-size:2rem; font-weight:bold;">KREIRAJ MOJ OPG!!! - klikni me!</a>
                @endisset

    @isset($user_firm)
        <div class="col-lg-7 mb-4 shadow user_search">
        <a href="{{route('show_opg' , $user_firm->id)}}">
          <h4 style="margin-bottom:2rem; text-align: center;">{{$user_firm->firm_name}}</h4>
        </a>  

         
         
          <form action="{{route('store_new_opg' , [$user_firm->id])}}" method="POST" enctype="multipart/form-data">
            @csrf 

            <input type="text" name="user_id" hidden value="{{Auth::id()}}">


            <div class="form-row">
            <div class="form-group col-md-12">
              <label for="opg_name" class="subtitle">OPG IME</label>
              <input required type="text" style="border-left: 9px solid #D92139;" class="form-control " height="55" name="opg_name" id="opg_name" placeholder="{{$user_firm->firm_name}}" >
            </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="owner" class="subtitle">VLASNIK</label>
                <input required type="text" style="border-left: 9px solid #D92139;" class="form-control " height="55" name="owner" id="owner" placeholder="{{$user_firm->owner_name}}" >
               </div>
        

           
                <div class="form-group col-md-6">
                  <label for="adress" class="subtitle">ADRESA</label>
                  <input required type="text" style="border-left: 9px solid #D92139;" class="form-control " height="55" name="adress" id="adress" placeholder="{{$user_firm->address}}" >
                </div>
            </div>


            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="opg_zupanija" class="subtitle">ŽUPANIJA</label>
                  <select required id="opg_zupanija" name="opg_zupanija" class="form-control">
                  <option selected>{{$user_firm->zupanija}}</option>
                    <option value="Osječko Barnjska">Osječko Barnjska</option>
                    <option value="Brodsko-Posavska">Brodsko-Posavska</option>
                    <option value="Dubrovnik-Neretva">Dubrovnik-Neretva</option>
                    <option value="Bjelovar-Bilogora">Bjelovar-Bilogora</option>
                    <option value="Istra">Istra</option>
                    <option value="Karlovac">Karlovac</option>
                    <option value="Koprivnica-Križevci">Koprivnica-Križevci</option>
                    <option value="Krapina-Zagorje">Krapina-Zagorje</option>
                    <option value="Lika-Senj">Lika-Senj</option>
                    <option value="Međimurje">Međimurje</option>
                    <option value="Požega-Slavonia">Požega-Slavonia</option>
                    <option value="Primorje-Gorski Kotar">Primorje-Gorski Kotar</option>
                    <option value="Šibenik-Knin">Šibenik-Knin</option>
                    <option value="Sisak-Moslavina">Sisak-Moslavina</option>
                    <option value="Split-Dalmatia">Split-Dalmatia</option>
                    <option value="Varaždin">Varaždin</option>
                    <option value="Virovitica-Podravina">Virovitica-Podravina</option>
                    <option value="Vukovar-Srijem">Vukovar-Srijem</option>
                    <option value="Zadar">Zadar</option>
                    <option value="Zagreb County">Zagreb County</option>
                    <option value=">City of Zagreb">City of Zagreb</option>
                  </select>
              </div>
              </div>

            <br>

            <div class="form-row">
              
                <div class="form-group col-md-12">
                  <label for="social_network" class="subtitle">DRUŠTVENE MREŽE - LINKOVI</label>
                  <textarea required  data-toggle="tooltip" data-placement="left" title="Molim kopirajte linkove profila društvenih mreža ili link svoje web stranice (ukoliko ih imate)!" class="form-control" id="social_network" name="social_network" rows="3" placeholder="{{$user_firm->web_contact}}"></textarea>
                </div>

                <div class="form-group col-md-12">
                  <label for="what_we_do" class="subtitle">O NAMA</label>
                  <textarea required class="form-control"  data-toggle="tooltip" data-placement="left" title="Opiši čime se Vaš OPG bavi, kakve uvjete ima i slično! DO 250 RIJEČI" id="what_we_do" name="what_we_do" rows="3" placeholder="{{$user_firm->firm_description}}"></textarea>
                </div>
             

                <div class="form-group col-md-12">
                  <label for="opg_avatar" class="subtitle">UNESI NOVU PROFILNU SLIKU OPG-a</label>
                  <input required type="file"  class="form-control-file" id="opg_avatar" name="opg_avatar">
                </div>

                </div>

                <div class="center">
                 <a href=""> <button  data-toggle="tooltip" data-placement="left" title="PAZI! Kada mjenjaš podatke, moraš popuniti cijeli formular jer svako prazno polje ce izbrisati postojeći podatak"
                  type="submit" class="btn btn-lg" style="margin-bottom:2rem; color:white;">IZMIJENI</button></a>
                </div>
          </form>
    
    </div>

    <div class="col-lg-2 mb-4 ">
      <h5 style="margin-bottom:1rem;">Slika moga OPG</h5>

      <a href="{{route('show_opg' , $user_firm->id)}}">
        <img  data-toggle="tooltip" data-placement="left" title="Ovo je trenutna profilna slika Vašeg OPG-a"
        src="{{url('avatars/firms_avatars/' . $user_firm->avatar)}}" class="img-fluid rounded  mb-7" width="200" height="100"  alt="avatar_opg-picture">
      </a>

      <h4 style="margin-top:3rem;" style="text-align: justify">STATISTIKA</h4>
      @isset($count_firm_reviews)
      @isset($count_firm_favourites)
      @isset($count_product_favourites)
      <h4 style="margin-top:3rem;">OPG:</h4>
        <i data-toggle="tooltip" data-placement="left" title="Broj recenzija Vašeg OPG-a" class="fa fa-star" aria-hidden="true"></i> {{$count_firm_reviews}} - recenzije
        <br>
        <i style="margin-top:2rem;"data-toggle="tooltip" data-placement="left" title="Broj koliko je puta Vaš OPG stavljen u favorite" class="fa fa-heart" aria-hidden="true"></i> {{$count_firm_favourites}}  - favoriti

      <h4 style="margin-top:3rem;">Proizvodi:</h4>
        <i data-toggle="tooltip" data-placement="left" title="Broj koliko su puta Vaši proizvodi stavljeni u favorite" class="fa fa-heart" aria-hidden="true"></i> {{$count_product_favourites}}  -favoriti
        
    </div>
    @endisset
    @endisset
    @endisset

  </div>
  </div>

  @endisset
</section>
@include('footer.footer_all_other')
@endsection