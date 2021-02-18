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

<div class="subtitle">
Pronađeni proizvodi za županiju - 

@isset($trazena_zupanija)
{{$trazena_zupanija}}
@endisset
</div>


<hr>



        


<div class="row">

@isset($search_results_zupanije)

@if(is_array($search_results_zupanije) || is_object($search_results_zupanije))

    @foreach($search_results_zupanije as $one_product)
   
      <div class="col-md-4">
      <div class="card" style="margin-top:2rem;" >
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
             <li class="list-group-item">Adresa:  {{$one_product->address}} </li>
           </ul>
             
          
           <div class="card-footer text-muted">
            <a href="{{route('show_product' , [$one_product->id])}}" style="text-decoration:none; color:black;"> Detaljnije o proizvodu<i class="fa fa-search" style="float:right"></i> </a>
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


{{ $search_results_zupanije->appends(request()->input())->links('mobile-pagination-template') }}

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