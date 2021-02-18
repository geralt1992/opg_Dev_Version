@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->

@include('navbar.navbar')

<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="opg_banner" id="opg_banner">
    <div class="title">{{$my_opg->firm_name}}</div>
    </section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
<section class="opg" id="opg">

    <div class="container">
        <div class="row">
            <div class="opg_main">
                <img  src="{{url('avatars/firms_avatars/' . $my_opg->avatar)}}" alt="profile-picture">

                @isset($favourite_check_show_remove_button)
                <div class="overall_rating"> <a href="{{route('remove_firm_favourite' , [$my_opg->id])}}">Ukloni iz favorita <i class="fas fa-trash"></i> </a></div>
                @endisset

                @isset($favourite_check_show_fav_button)
                <div class="overall_rating"> <a href="{{route('save_user_firm_favourite' , [$my_opg->id])}}">Stavi u favorite <i class="fas fa-heart"></i> </a></div>
                @endisset

            </div>
        </div>

            <div class="opg_subtitle">
                Opći i kontakt podatci
            </div>

            <table class="table table-borderless">

                <tbody>
                  <tr>
                    <th scope="row">Ime OPG-a</th>
                    <td>{{$my_opg->firm_name}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Ime vlasnika</th>
                    <td>{{$my_opg->owner_name}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Adresa</th>
                    <td>{{$my_opg->address}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Županija</th>
                    <td>{{$my_opg->zupanija}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Web site/društvene mreže</th>
                    <td>{{$my_opg->web_contact}}</td>
                  </tr>

                </tbody>
              </table>


            <div class="opg_subtitle">
                Čime se mi bavimo?
            </div>

            <div class="col-md-7">
                <div class="description_of_opg">
                {{$my_opg->firm_description}}
            </div>

        </div>


    <div class="opg_subtitle">
        Naša galerija
     </div>



    <div class="row text-center text-lg-left">

    @isset($my_opg_gallery)
    @foreach($my_opg_gallery as $my_opg_galleryi)

      <div class="col-lg-3 col-md-4 col-6">
        <a data-toggle="tooltip" data-placement="left" title="Uvećaj sliku" href="{{url('avatars/galleries_avatars/' . $my_opg_galleryi->gallerie_avatar)}}" class="d-block mb-4 h-100 gallery-item" target=”_blank” class="test-popup-link">
          <img class="img-fluid img-thumbnail gallery-item" src="{{url('avatars/galleries_avatars/' . $my_opg_galleryi->gallerie_avatar)}}" alt="user_opg_gallery_image" style="width:100%; height:300px;">
        </a>
      </div>

    @endforeach
    @endisset
  </div>


        <div class="opg_subtitle">
            Naša ponuda
        </div>

        <div class="col-md-7">
            <div class="opg_categories">
                <div class="opg_subtitle">
                   KATEGORIJE
                </div>
                @isset($my_opg_categories)
                  @if(is_array($my_opg_categories) || is_object($my_opg_categories))
                    @foreach($my_opg_categories as $one_productt)
                      {{$one_productt->product_category_app}},
                    @endforeach
                 @endif
                @endisset
          </div>
        </div>


        <div class="opg_articles">
            <div class="opg_subtitle">
                ARTIKLI
             </div>



    <div class="row">


      @isset($my_opg_products)
      @if(is_array($my_opg_products) || is_object($my_opg_products))
          @foreach($my_opg_products as $one_product)


          <div class="col-md-4">
                    <div class="card" style="margin-bottom:2rem;" >
                    <img src="{{url('avatars/products_avatars/' . $one_product->product_avatar)}}" alt="profile-picture">
                     <div class="card-body">
                       <h5 class="card-title">{{$one_product->product_name}}</h5>
                       {{$one_product->product_price}} KN{{$one_product->product_measure}}
                     </div>
                     <ul class="list-group list-group-flush">
                       <li class="list-group-item">Kategorija:  {{$one_product->product_category_app}} </li>
                     </ul>
                     <div class="card-footer text-muted">
                     <a href="{{route('show_product' , [$one_product->id])}}" style="text-decoration:none; color:black;"> Više o proizvodu<i class="fa fa-search" style="float:right"></i> </a>
                       </div>
                   </div>
                 </div>

      @endforeach
      @endisset
      @endif



     </div>

    </div>


 <div class="opg_subtitle">
  <h1> Naši potrošači o nama? </h1>

    <br><br>
    <h2>  Prosječna ocjena!</h2>
  </div>


  <table class="table table-borderless">

    <tbody>
      <tr>
        <th scope="row">Uslužnost i pristupačnost</th>
        <td>
        @isset($my_opg_reviews_service_rating)
            @for ($i = 0; $i < 5; $i++)
                  @if (floor($my_opg_reviews_service_rating) - $i >= 1)
                      <i class="fas fa-star "> </i>
                  @endif
              @endfor
        @endisset
            </td>
      </tr>
      <tr>
        <th scope="row">Cijena</th>
        <td>
        @isset($my_opg_reviews_price_rating)
            @for ($i = 0; $i < 5; $i++)
                  @if (floor($my_opg_reviews_price_rating) - $i >= 1)
                      <i class="fas fa-star "> </i>
                  @endif
              @endfor
        @endisset
            </td>
      </tr>
      <tr>
        <th scope="row">Kvaliteta</th>
        <td>
        @isset($my_opg_reviews_quality_rating)
            @for ($i = 0; $i < 5; $i++)
                  @if (floor($my_opg_reviews_quality_rating) - $i >= 1)
                      <i class="fas fa-star "> </i>
                  @endif
              @endfor
        @endisset
            </td>
      </tr>
      <tr>
        <th scope="row">Sveukupna ocijena</th>
        <td>
        @isset($my_opg_reviews_overall_rating)
            @for ($i = 0; $i < 5; $i++)
                  @if (floor($my_opg_reviews_overall_rating) - $i >= 1)
                      <i class="fas fa-star "> </i>
                  @endif
              @endfor
        @endisset
            </td>
      </tr>


    </tbody>
  </table>


  <div class="opg_subtitle" style="margin-top: 10rem;">
  <h2> Recenzije </h2>
  </div>
  <div class="review_window">

  @isset($my_opg_reviews)
      @if(is_array($my_opg_reviews) || is_object($my_opg_reviews))
        @foreach($my_opg_reviews as $one_review)

        <div class="card text-black bg-white border-light" style="max-width: 35rem;">

          <div class="card-header">{{$one_review->name}}, {{ Carbon\Carbon::parse($one_review->created_at)->format('d. m. Y')}}  </div>
          <div class="card-body">
          <h5 class="card-title" style="font-size: 1.5rem;"> <b> {{$one_review->title}}</b></h5>
          <p class="card-text" style="font-size: 1.2rem;"> {{$one_review->review_content}}</p>
          </div>

        </div>



        <table class="table table-borderless">

      <tbody>
        <tr>
          <th scope="row">Uslužnost i pristupačnost</th>
          <td>
            @for ($i = 0; $i < 5; $i++)
                  @if (floor($one_review->service_rating) - $i >= 1)
                      {{--Full Start--}}
                      <i class="fas fa-star text-warning"> </i>

                  @else
                      {{--Empty Start--}}
                      <i class="far fa-star text-warning"> </i>
                  @endif
              @endfor
            </td>
        </tr>
        <tr>
          <th scope="row">Cijena</th>
          <td>
            @for ($i = 0; $i < 5; $i++)
                  @if (floor($one_review->price_rating) - $i >= 1)
                      {{--Full Start--}}
                      <i class="fas fa-star text-warning"> </i>

                  @else
                      {{--Empty Start--}}
                      <i class="far fa-star text-warning"> </i>
                  @endif
              @endfor
            </td>
        </tr>
        <tr>
          <th scope="row">Kvaliteta</th>
          <td>
            @for ($i = 0; $i < 5; $i++)
                  @if (floor($one_review->quality_rating) - $i >= 1)
                      {{--Full Start--}}
                      <i class="fas fa-star text-warning"> </i>

                  @else
                      {{--Empty Start--}}
                      <i class="far fa-star text-warning"> </i>
                  @endif
              @endfor
            </td>
        </tr>

        <tr>
          <th scope="row">Sveukupna ocijena</th>
          <td>
          @for ($i = 0; $i < 5; $i++)
                  @if (floor($one_review->overall_rating) - $i >= 1)
                      {{--Full Start--}}
                      <i class="fas fa-star text-warning"> </i>

                  @else
                      {{--Empty Start--}}
                      <i class="far fa-star text-warning"> </i>
                  @endif
              @endfor
            </td>
        </tr>
      </tbody>
      </table>
          <div class="card text-black bg-white border-light" style="max-width: 35rem;">
            <div class="card-footer" style="font-size: 1rem;">Preporuka: {{$one_review->redommendation}}</div>
          </div>
<hr>
        @endforeach
      @endif
      {{$my_opg_reviews->appends(request()->input())->links('mobile-pagination-template') }}
  @endisset
  </div>

<button type="submit" class="btn"> <a href="{{route('show_review_form' , [$id = $my_opg->id])}}"> Ostavi recenziju </a></button>

</section>
<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->
@include('footer.footer_all_other')

@endsection
