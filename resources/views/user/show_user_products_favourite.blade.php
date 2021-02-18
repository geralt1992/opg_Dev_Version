@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->
@include('navbar.navbar')
<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="user_main_banner " id="user_main_banner">
  <div class="title">Moj favoriti</div>
</section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
<section class="pt-5 pb-5 user_main opg_products_favourite" id="user_main opg_products_favourite">
  <div class="container">
    <div class="row">
                @include('user_sidebar.sidebar')
      <div class="col-lg-9 mb-4 shadow user_search">
        <h4 style="margin-bottom:2rem;">Moji proizvodi </h4>

<section class="opg_products_favourites" id="opg_products_favourites">
  <div class="container">
<hr>
<div class="row">


@isset($user_favourites_products)
                    @if(is_array($user_favourites_products) || is_object($user_favourites_products))
                    @foreach($user_favourites_products as $one_favourite_product)
                    


      <div class="col-md-4">
        <div class="card" >
       <a href="{{route('show_product' , [$one_favourite_product->id])}}"> 
       <img src="{{url('avatars/products_avatars/' . $one_favourite_product->product_avatar)}}"   class="my_img" style="width:100%; height: 15vw; object-fit: cover; color:black;" alt="profile-picture" >
       </a> 
         <div class="card-body">
           <h5 class="card-title">{{$one_favourite_product->product_name}}</h5>
           {{$one_favourite_product->product_price}}KN {{$one_favourite_product->product_measure}}
         </div>
         <ul class="list-group list-group-flush">
           <li class="list-group-item">Kategorija: {{$one_favourite_product->product_category_app}} </li>
         </ul>
         <div class="card-footer text-muted">
                <a href="{{route('show_product' , [$one_favourite_product->id])}}" style="text-decoration:none; color:black;"> Više o proizvodu<i class="fa fa-search" style="float:right"></i> </a>
              </div>
         <div class="card-footer text-muted">
          <a href="{{route('remove_product_favourite' , [$one_favourite_product->id])}}" >Ukloni<i class="fas fa-trash"></i> </a>
          </div>
       </div>
     </div>
                  @endforeach
                  @endif
                @endisset
         </div>
      </div>
    </section>
     </div>
    </div>
  <hr>
  </div>
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