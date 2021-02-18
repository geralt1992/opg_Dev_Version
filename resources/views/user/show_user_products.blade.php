@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->
@include('navbar.navbar')
<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="user_main_banner" id="user_main_banner">
  <div class="title">Proizvodi</div>
</section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
<section class="pt-5 pb-5 user_main user_opg_products" id="user_main user_opg_products">
  <div class="container">
    <div class="row">
                @include('user_sidebar.sidebar')

                @isset($create_ur_firm)
                    <a href="{{route('create_opg')}}"style="color:balck; font-size:2rem; font-weight:bold;">KREIRAJ MOJ OPG!!! - klikni me!</a>
                @endisset


      <div class="col-lg-9 mb-4 shadow user_search">
        <h4 style="margin-bottom:2rem;">Unesi novi proizvod </h4>

               <form action="{{route('save_new_user_products')}}" method="POST" style="margin-top: 2rem;" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                    <div class="form-group col-md-12">
                      <label class="subtitle" for="name_product">IME PROIZVODA</label>
                      <input required type="text" value="{{ old('name_product') }}" style="border-left: 9px solid #D92139;" class="form-control" name="name_product" id="name_product" placeholder="Unesi ime proizvoda" >
                    </div>
                    </div>
                 

                    <div class="form-row">
                    
                      <div class="form-group col-md-12">
                            <label class="subtitle" for="categori">KATEGORIJA</label>
                            <select required id="categori" name="categori" value="{{ old('categori') }}" class="form-control">
                              <option selected>Odaberi...</option>
                              <option value="voće">Voće</option>
                              <option value="povrće">Povrće</option>
                              <option value="meso">Meso</option>
                              <option value="mliječni proizvodi">Mliječni proizvodi</option>
                              <option value="sokovi">Sokovi</option>
                              <option value="ulja">Ulja</option>
                              <option value="alkoholna pića">Alkoholna pićai</option>
                              <option value="orašasti plodovi">Orašasti plodovi</option>
                              <option value="ostalo">Ostali proizvodi</option>
                            </select>
                      </div>

                      <div class="form-group col-md-12">
                      <label class="subtitle" for="subcategori">PODKATEGORIJA</label>
                        <input required type="text" value="{{ old('subcategori') }}" style="border-left: 9px solid #D92139;" class="form-control" name="subcategori" id="subcategori" placeholder="Za meso - npr. janjetina, svinjetina ILI samo upišite ponovo ime proizovda" ></div>

                    

                      <div class="form-group col-md-8">
                        <label class="subtitle" for="price">CIJENA</label>
                        <input required type="number" value="{{ old('price') }}" class="form-control" name="price" id="price" placeholder="Cijena proizvoda" >
                      </div>

                      <div class="form-group col-md-4">
                        <label class="subtitle" for="messurment">JEDINICA</label>
                          <select required id="messurment" name="messurment" class="form-control" value="{{ old('messurment') }}">
                            <option selected>Odaberi...</option>
                            <option value="/kom">komad</option>
                            <option value="/l">litra</option>
                            <option value="/kg">1 kilogram</option>
                            <option value="/0.5kg">0.5 kilograma</option>
                            <option value="/10g">10 grama</option>
                            <option value="/50g">50 grama</option>
                            <option value="/100g">100 grama</option>
                            <option value="/tegla">tegla</option>
                          </select>
                      </div>
                    </div>


                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <label for="product_desc" class="product_desc">O PROIZVODU</label>
                      <textarea required class="form-control"  value="{{ old('product_desc') }}" data-toggle="tooltip" data-placement="left" title="Opiši Vaš proizvod! DO 250 RIJEČI" id="product_desc" name="product_desc"rows="3" placeholder="Ukratko opišite svoj proizvod, zašto bi netko kupio baš Vaš proizvod?"></textarea>
                    </div>

                    <div class="form-group col-md-12">
                      <label for="product_picture">UPLODAJ SLIKU PROIZVODA</label><br>
                      <input style=" word-wrap: break-word;" value="{{ old('product_picture') }}" type="file"required id="product_picture" name="product_picture"><br><br>
                      
                     
                    <div class="center">
                    <button type="submit" class="btn btn-lg" style="color:white;">SPREMI</button>
                    </div>
                </div>

                </form>
          </div>
    </div>
     <hr>
  </div>
</section>

<!---------------------------------------------------------------------------------------------PRIKAZ PRODUKATA------------------------------------------------------------------ -->
<section class="opg_products" id="opg_products">
  <div class="container">


  <div class="subtitle">
    Moji proizvodi - FILTERI
  </div>

  <div class="row">
    <ul >
       <a href="{{route('search_product_categorie' , [$categorie = 'voće'])}}" style="color:black"><li>Voće</li></a>
       <a href="{{route('search_product_categorie' , [$categorie = 'povrće'])}}" style="color:black"><li>Povrće</li></a>
       <a href="{{route('search_product_categorie' , [$categorie = 'meso'])}}" style="color:black"><li>Meso</li></a>

       <a href="{{route('search_product_categorie' , [$categorie = 'mliječni proizvodi'])}}" style="color:black"><li>Mliječni proizvodi</li></a>
       <a href="{{route('search_product_categorie' , [$categorie = 'sokovi'])}}" style="color:black"><li>Sokovi</li></a>
       <a href="{{route('search_product_categorie' , [$categorie = 'ulja'])}}"><li style="color:black">Ulja</li></a>

       <a href="{{route('search_product_categorie' , [$categorie = 'alkoholna pića'])}}" style="color:black"><li>Alkoholna pića</li></a>
       <a href="{{route('search_product_categorie' , [$categorie = 'orašasti proizvodi'])}}" style="color:black"><li>Orašasti plodovi</li></a>
       <a href="{{route('search_product_categorie' , [$categorie = 'ostalo'])}}"><li style="color:black">Ostali proizvodi</li></a>
       <a href="{{route('show_user_products')}}" style="color:black"><li>SVI proizvodi</li></a>
      
    </ul>
  </div>

  <div class="row">
       <a href="{{route('are_my_products_favourited')}}" style="color:red;"><li>MOJI PROIZVODI U FAVORITIMA</li></a>
  </div>


<hr>

<div class="row">
 <!--SVI MOJ PROIZVODI-->
        @isset($user_opg_products)
        @foreach($user_opg_products as $one_user_opg_product)
        
        <div class="col-md-4">
        <div class="card" >
                <div class="card-header">
                @isset($user_opg_name)
                   {{$user_opg_name}}
                @endisset
            </div>
            <a href="{{route('show_product' , [$one_user_opg_product->id])}}">
              <img src="{{url('avatars/products_avatars/' . $one_user_opg_product->product_avatar)}}" class="my_img" style="width:100%; height: 15vw; object-fit: cover; color:black;" alt="profile-picture">
            </a>

             <div class="card-body">
               <h5 class="card-title"> {{$one_user_opg_product->product_name}}</h5>
               {{$one_user_opg_product->product_price}} KN   {{$one_user_opg_product->product_measure}}
             </div>

             <ul class="list-group list-group-flush">
               <li class="list-group-item">Kategorija:  {{$one_user_opg_product->product_category_app}} </li>
               <li class="list-group-item">Podkatgorija:  {{$one_user_opg_product->product_category_owner}} </li>
             </ul>

              <div class="card-footer text-muted">
                <a href="{{route('show_product' , [$one_user_opg_product->id])}}" style="text-decoration:none; color:black;"> Više o proizvodu<i class="fa fa-search" style="float:right"></i> </a>
              </div>

              @if($one_user_opg_product->sold == 0)
              <div class="card-footer text-muted">
                <a href="{{route('product_is_sold' , [$one_user_opg_product->id])}}" style="text-decoration:none; color:black;"  data-toggle="tooltip" data-placement="left" title="Klikni i izmjeni status proizvoda"> Proizvod je na raspolaganju <i class="fa fa-check" aria-hidden="true"></i>   </a>
              </div>
             
              @else
              <div class="card-footer text-muted">
                <a href="{{route('product_is_active' , [$one_user_opg_product->id])}}" style="text-decoration:none; color:black;"  data-toggle="tooltip" data-placement="left" title="Klikni i izmjeni status proizvoda"> Proizvod je rasprodan <i class="fa fa-times" aria-hidden="true"></i>   </a>
              </div>
              @endif

              <div class="card-footer text-muted">
                <a href="{{route('delete_user_products' , [$id = $one_user_opg_product->id])}}" style="text-decoration:none; color:black;"> Ukloni<i class="fas fa-trash"></i> </a>
              </div>

           </div>
         </div>
        @endforeach
        @endisset


<!--FILTER PO KATEGORIJI-->
        @isset($my_categorie)
        @foreach($my_categorie as $my_products_by_categorie)
      <div class="col-md-4">
      <div class="card" >
              <div class="card-header">
              @isset($user_opg_name_categorie)
                 {{$user_opg_name_categorie}}
              @endisset
                </div>
                <img src="{{url('avatars/products_avatars/' . $my_products_by_categorie->product_avatar)}}" class="my_img" style="width:100%; height: 15vw; object-fit: cover; color:black;" alt="profile-picture">
           <div class="card-body">
             <h5 class="card-title"> {{$my_products_by_categorie->product_name}}</h5>
             {{$my_products_by_categorie->product_price}} KN   {{$my_products_by_categorie->product_measure}}
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Kategorija:  {{$my_products_by_categorie->product_category_app}} </li>
             <li class="list-group-item">Podkatgorija:  {{$my_products_by_categorie->product_category_owner}} </li>
           </ul>

              <div class="card-footer text-muted">
                <a href="{{route('show_product' , [$my_products_by_categorie->id])}}" style="text-decoration:none; color:black;"> Više o proizvodu<i class="fa fa-search" style="float:right"></i> </a>
              </div>


              @if($my_products_by_categorie->sold == 0)
              <div class="card-footer text-muted">
                <a href="{{route('product_is_sold' , [$my_products_by_categorie->id])}}" style="text-decoration:none; color:black;"  data-toggle="tooltip" data-placement="left" title="Klikni i izmjeni status proizvoda"> Proizvod je na raspolaganju <i class="fa fa-check" aria-hidden="true"></i>   </a>
              </div>
              
              @else
              <div class="card-footer text-muted">
                <a href="{{route('product_is_active' , [$my_products_by_categorie->id])}}" style="text-decoration:none; color:black;"  data-toggle="tooltip" data-placement="left" title="Klikni i izmjeni status proizvoda"> Proizvod je rasprodan <i class="fa fa-times" aria-hidden="true"></i></a>
              </div>
             
              @endif

          


              <div class="card-footer text-muted">
                <a href="{{route('delete_user_products' , [$id = $my_products_by_categorie->id])}}" style="text-decoration:none; color:black;"> Ukloni<i class="fas fa-trash"></i> </a>
              </div>
         </div>
       </div>
      @endforeach
     @endisset


<!--FILTER PO FAVORITIMA-->
     @isset($are_my_products_favourited)
        @foreach($are_my_products_favourited as $are_my_products_favourited_one)
      <div class="col-md-4">
      <div class="card" >
              <div class="card-header">
              {{$are_my_products_favourited_one->firm_name}}
                </div>
                <img src="{{url('avatars/products_avatars/' . $are_my_products_favourited_one->product_avatar)}}" class="my_img" style="width:100%; height: 15vw; object-fit: cover; color:black;" alt="profile-picture">
           <div class="card-body">
             <h5 class="card-title"> {{$are_my_products_favourited_one->product_name}}</h5>
             {{$are_my_products_favourited_one->product_price}} KN   {{$are_my_products_favourited_one->product_measure}}
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Kategorija:  {{$are_my_products_favourited_one->product_category_app}} </li>
             <li class="list-group-item">Podkatgorija:  {{$are_my_products_favourited_one->product_category_owner}} </li>
           </ul>
           <div class="card-footer text-muted">
               <p> Stavljen u favorite: {{$are_my_products_favourited_one->put_in_favourites}} put/a<i class="fa fa-heart"></i> </p>
              </div>

              <div class="card-footer text-muted">
                <a href="{{route('show_product' , [$are_my_products_favourited_one->product_id])}}" style="text-decoration:none; color:black;"> Više o proizvodu<i class="fa fa-search" style="float:right"></i> </a>
              </div>



              @if($are_my_products_favourited_one->sold == 0)
              <div class="card-footer text-muted">
                <a href="{{route('product_is_sold' , [$are_my_products_favourited_one->product_id])}}" style="text-decoration:none; color:black;"  data-toggle="tooltip" data-placement="left" title="Klikni i izmjeni status proizvoda"> Proizvod je na raspolaganju <i class="fa fa-check" aria-hidden="true"></i>   </a>
              </div>
             
              @else
              <div class="card-footer text-muted">
                <a href="{{route('product_is_active' , [$are_my_products_favourited_one->product_id])}}" style="text-decoration:none; color:black;"  data-toggle="tooltip" data-placement="left" title="Klikni i izmjeni status proizvoda"> Proizvod je rasprodan <i class="fa fa-times" aria-hidden="true"></i>   </a>
              </div>
              @endif



              <div class="card-footer text-muted">
                <a href="{{route('delete_user_products' , [$id = $are_my_products_favourited_one->product_id])}}" style="text-decoration:none; color:black;"> Ukloni<i class="fas fa-trash"></i> </a>
              </div>
         </div>
       </div>
      @endforeach
     @endisset

        </div>
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