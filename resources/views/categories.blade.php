@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->
@include('navbar.navbar')
<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="categories_banner" id="categories_banner">
  <div class="title">{{$categorie}}</div>
</section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
<section class="categories" style="height:auto;" id="categories">
    <div class="container">

     <div class="subtitle">
        Filtriraj - nije nužno popuniti sva polja!                                

     </div>

     <div class="subtitle">
      @isset($no_results)
        <b>{{$no_results}}</b>
      @endisset
     </div>
  
<div class="row" style="margin-top:5rem;">

    <div class="categories_search">
        <form method="head" action="{{route('main_categories_search' , [$categorie])}}">
            @csrf

      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name_of_product_categorie">Ime proizvoda</label>
            <input type="text" class="form-control" value="{{ old('name_of_product_categorie') }}"  style="border-left: 9px solid #D92139;" style="font-size:20px;" name="name_of_product_categorie" id="name_of_product_categorie" placeholder="Unesite traženo ime" {{ old('name_of_product_categorie') }}>
          </div>

          <div class="form-group col-md-6">
            <label for="place_of_product_categorie">Iz mjesta</label>
            <input type="text" class="form-control" value="{{ old('place_of_product_categorie') }}"  style="border-left: 9px solid #D92139;" style="font-size:20px;" name="place_of_product_categorie" id="place_of_product_categorie" placeholder="Unesite traženo mjesto" {{ old('place_of_product_categorie') }} >
          </div>

          <div class="form-group col-md-6">
            <label for="firm_zupanija">Iz županije</label>
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
            <div class="center">
            <button type="submit" class="btn">Pretraži</button>
            </div>
        </form>
    </div>
</div>
</div>

<hr>





<div class="container">


    <div class="row">

    @isset($searched_categorie)
      @if(is_array($searched_categorie) || is_object($searched_categorie))
          @foreach($searched_categorie as $one_product)
            <div class="col-md-3">
              <div class="card product_search" style="margin-top:2rem;" >
              <div class="card-header">
                    {{$one_product->firm_name}}
                  </div>
                  <a href="{{route('show_product' , [$one_product->id])}}">
                <img src="{{url('avatars/products_avatars/' . $one_product->product_avatar)}}" class="my_img" style="width:100%; height: 15vw; object-fit: cover; color:black;" alt="profile-picture">
                <div class="card-body">
                    <h5 class="card-title"> {{$one_product->product_name}}</h5>
                    <p class="card-text">{{$one_product->product_price}} KN{{$one_product->product_measure}} </p>
                    <p class="card-text" style="float:right;"></p>
                </div>
                </a>
                <ul class="list-group list-group-flush">
               <li class="list-group-item">Županija: {{$one_product->zupanija}} </li>
             </ul>
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
        {{$searched_categorie->appends(request()->input())->links('mobile-pagination-template') }}
        </div>  
    </div>
    @endif

</section>

<!---------------------------------------------------------------------------------------------results------------------------------------------------------------------ -->





<section class="categories">
  <div class="container">
    <div class="row">

      @isset($search_results)
      @if(is_array($search_results) || is_object($search_results))
        @foreach($search_results as $one_product)

        <div class="col-md-3">
              <div class="card product_search" style="margin-top:2rem;" >
              <div class="card-header">
                    {{$one_product->firm_name}}
                  </div>
                  <a href="{{route('show_product' , [$one_product->id])}}">
                <img src="{{url('avatars/products_avatars/' . $one_product->product_avatar)}}" class="my_img" style="width:100%; height: 15vw; object-fit: cover; color:black;" alt="profile-picture">
                <div class="card-body">
                    <h5 class="card-title"> {{$one_product->product_name}}</h5>
                    <p class="card-text">{{$one_product->product_price}} KN{{$one_product->product_measure}} </p>
                    <p class="card-text" style="float:right;"></p>
                </div>
                </a>
                <ul class="list-group list-group-flush">
               <li class="list-group-item">Županija: {{$one_product->zupanija}} </li>
             </ul>
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


