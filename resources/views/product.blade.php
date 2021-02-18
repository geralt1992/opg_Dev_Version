@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->

@include('navbar.navbar')

<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="user_main_banner" id="user_main_banner">
@isset($my_product)

    <div class="title">{{$my_product->product_name}}</div>
</section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col col-md-12 pr-md-5 pl-md-5">
                <div class="bd-example bd-example-tabs" >
                    
                    <div class="tab-content pt-5 pb-5"  id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                            <div class="container-fluid" style="background-color: white !important;">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-12 col-md-5  text-left">
                                        <h2>{{$my_product->product_name}} </h2>
                                        <p class=" mt-4">{{$my_product->product_desc}} </p>
                                        
                                        <h2 >Cijena</h2> {{$my_product->product_price}} KN/{{$my_product->product_measure}} 

                                        <div class="pomak" style="margin-top:2rem;">
                                        <h2 >Kategorija</h2>{{$my_product->product_category_app}} - {{$my_product->product_category_owner}} 

                                        <div class="pomak2"style="margin-top:2rem;" >
                                                <h2>  Favorit </h2> {{$how_much_time_is_fav}} puta stavljen u favorite <i class="fa fa-heart" style="color:red; "> </i> 
                                        </div>


                                             </div>
                                                @isset($my_products_opg)
                                                <blockquote class="card  text-left  py-3 px-4 mb-3 mt-4">
                                                    <div class="row align-items-center justify-content-between">
                                                        <div class="col-3  p-md-1 text-center rounded">
                                                          <a href="{{route('show_opg' , [$my_products_opg->firm_id])}}">
                                                              <img  src="{{url('avatars/firms_avatars/' . $my_products_opg->avatar)}}" style="height:80px; width:80; background-size: cover; " class="img-fluid py-0 rounded" alt="opg_name">
                                                          </a>  
                                                            <footer class="blockquote-footer small p-1"><span class="small"> {{$my_products_opg->owner_name}} <cite class="font-weight-bold">{{$my_products_opg->firm_name}}</cite></span></footer>
                                                        </div>

                                                        <div class="col-9 position-relative">
                                                            <p class=" m-0 text-muted small">
                                                            {{$my_products_opg->firm_description}}
                                                            </p>
                                                            <i class="fa fa-quote-right fa-2x text-muted pull-right mt-3" aria-hidden="true"></i></div>
                                                    </div>
                                                </blockquote>

                                              
                                            </div>
                                                 @endisset

                                
                                @if($my_product->sold == 0)
                                <div class="col-12 col-md-5 mb-4 ml-md-auto">
                                    <h4> <a style="display:block; float:right; margin-bottom:2rem; text-decoration:none;" href="{{route('set_up' , [ 'id' => $my_products_opg->user_id , 'messsage' => $my_product->product_name])}}">Ugovori kupnju <i class="fas fa-shopping-cart" style="display:inline; color:red;"></i> </a>
                                @else
                                <div class="col-12 col-md-5 mb-4 ml-md-auto">
                                    <h4> <p style="display:block; float:right; margin-bottom:2rem; text-decoration:none;">Proizvod je rasprodan! <i class="fa fa-times" aria-hidden="true" style="color:red; display:inline;"></i>  </p>
                                @endif
                                    
                                    <img src="{{url('avatars/products_avatars/' . $my_product->product_avatar)}}" style="height:400; width:600; background-size: cover;" class="img-fluid img-center mr-auto ml-auto d-none d-md-block ">
                                   
                                    @isset($favourite_check_show_fav_button)
                                   <h4> <a style="display:block; float:right; margin-top:2rem; text-decoration:none;" href="{{route('save_product_favourite' , [$my_product->id])}}">Stavi u favorite <i class="fas fa-heart" style="display:inline; color:red;"></i> </a>
                                   </h4>@endisset


                                    @isset($favourite_check_show_remove_button)
                                    <h4> <a style="display:block; float:right; margin-top:2rem; text-decoration:none;" href="{{route('remove_product_favourite' , [$my_product->id])}}">Ukloni iz favorita <i class="fas fa-trash" style="display:inline; color:red;"></i> </a>
                                    </h4> @endisset

                                 
                                    </div>
                                @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</section>

<section class="pt-5 pb-5">
    <div class="container"> 
      <h2 class="text-center font-weight-bold mb-5">Vezani proizvodi</h2>
      <hr>
      <div class="row ">

      @isset($related_products)
      @if(is_array($related_products) || is_object($related_products))
          @foreach($related_products as $one_product)
           
          <div class="col-md-4">
              <div class="card  ">
                  <div class="card-img-top">
                  <a href="{{route('show_product' , [$one_product->id])}}">
                    <img src="{{url('avatars/products_avatars/' . $one_product->product_avatar)}}" style="width:100%; height: 15vw; object-fit: cover; color:black;" class="my_img" alt="Card image cap">
                  </a>
                  </div>
                  <div class="card-body text-center">
                      <h4 class="card-title">
                          <a href="{{route('show_product' , [$one_product->id])}}" class=" font-weight-bold text-dark text-uppercase small">{{$one_product->product_name}}</a>
                        </h4>
                        <h6 class="card-price small text-dark">
                      <i style="display:block;">
                      {{$one_product->product_price}} KN{{$one_product->product_measure}}</i>
                        </h6>
                  </div>
              </div>
          </div>
         
      @endforeach
      @endisset
      @endif

      </div>
      <hr>
  </div>
</section>

<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->
@include('footer.footer_all_other')

@endsection

<style>

@media screen and (max-width: 800px) {
  .my_img {
    height: 75vw !important;
  }

}
</style>