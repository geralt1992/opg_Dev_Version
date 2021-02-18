@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->

@include('navbar.navbar')

<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="search_banner" id="search_banner">
    <div class="title">Pretraži OPG-ove</div>
    </section>

<!---------------------------------------------------------------------------------------------SEARCH------------------------------------------------------------------ -->
<section class="search" id="search">
<div class="container">

  <div class="subtitle" style="margin-top:2rem !important;">
  <p>NAPOMENA - Ne morate popuniti sva polja pretraživanja, unesite što Vam je dostatno za pretragu!</p> 

  @isset($no_results)
  <b>{{$no_results}}</b>
  @endisset
  </div>
</div>


    <form method="HEAD" action="{{route('find_opgs')}}" class="form_product_search">
        @csrf
        
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="firm_name">Ime OPG-a</label>
            <input type="text" value="{{ old('firm_name') }}" style="border-left: 9px solid #D92139;" class="form-control" name="firm_name" id="firm_name" placeholder="Unesi ime željenog OPG-a" {{ old('firm_name') }}>
          </div>

          <div class="form-group col-md-6">
            <label for="firm_product">OPG u ponudi ima</label>
            <input type="text" value="{{ old('firm_product') }}" style="border-left: 9px solid #D92139;" class="form-control" name="firm_product" id="firm_product" placeholder="Unesi proizvod koji želite da Vaš OPG nudi" {{ old('firm_product') }}>
          </div>
      </div>


      <div class="form-row">
        <div class="form-group col-md-12">
              <label for="firm_zupanija">OPG dolazi iz županije</label>
              <select  id="firm_zupanija" name="firm_zupanija" class="form-control">
                    
              <option disabled selected value>Odaberite...</option>
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


      <div class="form-row">
          <div class="form-group col-md-12">
              <label for="firm_place">OPG dolazi iz mjesta</label>
              <input type="text" value="{{ old('firm_place') }}" style="border-left: 9px solid #D92139;" class="form-control" name="firm_place" id="firm_place"  placeholder="Iz kojeg mjesta želite pretražiti OPG-ove?" {{ old('firm_place') }}>
          </div>
       </div>

        <div class="center">
          <button type="submit" class="btn btn-lg">Pretraži</button>
        </div>
      </form>
</section>

<hr>

<section class="drop_down">
  <div class="container">
    <div class="row down">

      @isset($firms)
      @if(is_array($firms) || is_object($firms))
          @foreach($firms as $firm)
            <div class="col-md-3">
              <div class="card product_search" style="margin-top:2rem;" >
                <img src="{{url('avatars/firms_avatars/' . $firm->avatar)}}" class="my_img" style="width:100%; height: 15vw; object-fit: cover;" alt="profile-picture">
                <div class="card-body">
                    <h5 class="card-title"> {{$firm->firm_name}}</h5>
                  Adresa  <p class="card-text">{{$firm->address}} - {{$firm->zupanija}} </p>
                    <p class="card-text" style="float:right;"> Vlasnik - {{$firm->owner_name}}</p>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('show_opg' , [$firm->id])}}" style="text-decoration:none; color:black;"> Više o gospodarstvu<i class="fa fa-search" style="float:right"></i> </a>
                </div>
              </div>
            </div>
      @endforeach
      @endisset
  </div>
</section>

<section style="height:15vh;">
    <div class="container">
        <div class="row">
        {{$firms->appends(request()->input())->links('mobile-pagination-template') }}
        </div>  
    </div>
    @endif

</section>

<!---------------------------------------------------------------------------------------------results------------------------------------------------------------------ -->

<section>

  <div class="container">
    <div class="row down">
   
      @isset($search_results)

      @if(is_array($search_results) || is_object($search_results))
        @foreach($search_results as $one_firm)
        <div class="col-md-3">
          <div class="card product_search" style="margin-top:2rem;" >
            <img src="{{url('avatars/firms_avatars/' . $one_firm->avatar)}}" class="my_img" style="width:100%; height: 15vw; object-fit: cover; color:black;" alt="profile-picture">
            <div class="card-body">
                <h5 class="card-title"> {{$one_firm->firm_name}}</h5>
              Adresa  <p class="card-text">{{$one_firm->address}} - {{$one_firm->zupanija}} </p>
                <p class="card-text" style="float:right;"> Vlasnik - {{$one_firm->owner_name}}</p>
            </div>
            <div class="card-footer text-muted">
                <a href="{{route('show_opg' , [$one_firm->firm_id])}}" style="text-decoration:none; color:black;"> Više o gospodarstvu<i class="fa fa-search" style="float:right"></i> </a>
            </div>
          </div>
        </div>
@endforeach
@endisset
    </div>
  </div>
</section>

<section style="height:15vh;">
  <div class="container">
    <div class="row">
      {{$search_results->appends(request()->input())->links('mobile-pagination-template') }}
    </div>  
  </div>
    @endif
</section>
@include('footer.footer_all_other')
@endsection


<style>

@media screen and (max-width: 800px) {
  .my_img {
    height: 55vw !important;
  }

}
</style>