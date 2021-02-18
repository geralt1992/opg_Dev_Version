@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->

@include('navbar.navbar')

<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="search_banner" id="search_banner">
    <div class="title">Rezultati pretrage</div>
    </section>

<!---------------------------------------------------------------------------------------------SEARCH------------------------------------------------------------------ -->
<section >
<div class="container">

<div class="subtitle less">
Broj pronađenih proizvoda je
{{@count($search_results)}}
</div>

<hr>
@isset($no_res_found)
{{$no_res_found}}
@endisset


@isset($search_results)
<div class="subtitle more">
Sortiraj po županiji
</div>

<form action="{{route('sub_zupanije_search_under_main_search' , [$variable = $request])}}" method="HEAD">
@csrf
<div class="form-group col-md-4">
                <label for="pretrazi_po_zupaniji" class="subtitle">ŽUPANIJA</label>
                  <select id="pretrazi_po_zupaniji" name="pretrazi_po_zupaniji" class="form-control">
                  <option selected>Odaberi županiju</option>
                  
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

                  <a href=""> <button type="submit" class="btn btn-lg" style="margin-bottom:2rem; color:white;">Traži</button></a>
              </div>
</form>       

<hr>

<div class="row down">



@if(is_array($search_results) || is_object($search_results))

    @foreach($search_results as $one_product)
   
      <div class="col-md-4">
      <div class="card " style="margin-top:2rem;" >
              <div class="card-header">
              <h5 class="card-title"> {{$one_product->firm_name}}</h5>
                </div>
                <img src="{{url('avatars/products_avatars/' . $one_product->product_avatar)}}" class="my_img" style="width:100%; height: 15vw; object-fit: cover; color:black;" alt="profile-picture">
           <div class="card-body">
             <h5 class="card-title"> {{$one_product->product_name}}</h5>
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Cijena:  {{$one_product->product_price}} KN{{$one_product->product_measure}} </li>
             <li class="list-group-item">Kategorija:  {{$one_product->product_category_app}} </li>
             <li class="list-group-item">Adresa:  {{$one_product->zupanija}} </li>
           </ul>
           <div class="card-footer text-muted">
            <a href="{{route('show_product' , [$one_product->id])}}" style="text-decoration:none; color:black;">Detaljnije o proizvodu<i class="fa fa-search" style="float:right"></i> </a>
            </div>
         </div>
       </div>

@endforeach

@endisset

      </div>
</section>

<section style="height:15vh;">
<div class="container">
<div class="row" style="margin-top:1rem;">


{{ $search_results->appends(request()->input())->links('mobile-pagination-template') }}

</div>
</div>
@endif
</section>
<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->
@include('footer.footer_all_other')

@endsection


<style>

@media screen and (max-width: 800px) {
  .my_img {
    height: 55vw !important;
  }

}
</style>