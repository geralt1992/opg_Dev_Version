@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->

@include('navbar.navbar')

<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="search_banner" id="search_banner">
    <div class="title">Pretraži proizvode</div>
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


    <form method="HEAD" action="{{route('find_products')}}" class="form_product_search">
        @csrf
        
    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="product_name">Ime proizvoda</label>
          <input type="text" value="{{ old('product_name') }}" class="form-control" style="border-left: 9px solid #D92139;" name="product_name" id="product_name" placeholder="Unesi ime željenog proizvoda" {{ old('product_name') }}>
        </div>

        <div class="form-group col-md-6">
          <label for="product_sub_category">Podkategorija</label>
          <input type="text"  value="{{ old('product_sub_category') }}" class="form-control" style="border-left: 9px solid #D92139;" name="product_sub_category" id="product_sub_category" placeholder="Upišite podkategoriju za točnije pretraživanje" {{ old('product_sub_category') }}>
      </div>
    </div>

      <div class="form-row">
          <div class="form-group col-md-12">
            <label for="kategorija">Kategorije</label>
            <select  id="kategorija" name="kategorija" class="form-control">
            <option disabled selected value>Odaberite...</option>
                <option value="voće">Voće</option>
                <option value="povrće">Povrće</option>
                <option value="meso">Meso</option>
                <option value="mliječni proizvodi">Mliječni proizvodi</option>
                <option value="orašasti plodovi">Orašasti plodovi</option>
                <option value="ostalo">Ostali proizvodi</option>
            </select>
            </div>
      </div>



      <div class="form-row">
        <div class="form-group col-md-12">
            <label for="product_place">Proizvod dolazi iz mjesta</label>
            <input type="text" value="{{ old('product_place') }}" class="form-control" style="border-left: 9px solid #D92139;" name="product_place" id="product_place"  placeholder="Iz kojeg mjesta želite pretražiti proizvode?" {{ old('product_place') }}>
        </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-12">
            <label for="product_zupanija">Županija</label>
            <select  id="product_zupanija" name="product_zupanija" class="form-control">
                  
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

        <div class="center">
          <button type="submit" class="btn btn-lg">Pretraži</button>
        </div>
      </form>
</section>

<hr>

<section class="drop_down">
  <div class="container">
    <div class="row down">

      @isset($products)
      @if(is_array($products) || is_object($products))
          @foreach($products as $one_product)
            <div class="col-md-3">
              <div class="card product_search" style="margin-top:2rem;" >
                <img src="{{url('avatars/products_avatars/' . $one_product->product_avatar)}}" class="my_img" style="width:100%; height: 15vw; object-fit: cover; color:black;" alt="profile-picture">
                <div class="card-body">
                    <h5 class="card-title"> {{$one_product->product_name}}</h5>
                    <p class="card-text">{{$one_product->product_price}} KN{{$one_product->product_measure}} </p>
                    <p class="card-text" style="float:right;">{{$one_product->firm_name}}</p>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('show_product' , [$one_product->id])}}" style="text-decoration:none; color:black;"> Više o proizvodu<i class="fa fa-search" style="float:right"></i> </a>
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
        {{$products->appends(request()->input())->links('mobile-pagination-template') }}
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
        @foreach($search_results as $one_product)
      <div class="col-md-3">
      <div class="card product_search" style="margin:2rem 0" >
        <img src="{{url('avatars/products_avatars/' . $one_product->product_avatar)}}" class="my_img" style="width:100%; height: 15vw; object-fit: cover; color:black;" alt="profile-picture">
          <div class="card-body">
            <h5 class="card-title"> {{$one_product->product_name}}</h5>
            <p class="card-text">{{$one_product->product_price}} KN{{$one_product->product_measure}} </p>
            <p class="card-text" style="float:right;">{{$one_product->firm_name}}</p>
          </div>
          <div class="card-footer text-muted">
            <a href="{{route('show_product' , [$one_product->id])}}" style="text-decoration:none; color:black;"> Više o proizvodu<i class="fa fa-search" style="float:right"></i> </a>
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