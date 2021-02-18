@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->
@include('navbar.navbar')
<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="user_main_banner" id="user_main_banner">
    <div class="title">Moji favoriti</div>
</section>

<!---------------------------------------------------------------------------------------------OPG FAVOURITES------------------------------------------------------------------ -->
<section class="pt-5 pb-5 user_main user_opg_products" id="user_main user_opg_products">
    <div class="container">
        <div class="row">
 @include('user_sidebar.sidebar')
            <div class="col-lg-9 mb-4 shadow">
                <h4 style="margin-bottom:2rem;">Moji OPG-ovi</h4>   
                <hr>

                <table class="table best_opgs1">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"><i class="fas fa-image"  style="font-size: 2rem;" data-toggle="tooltip" data-placement="left" title="Profilna slika OPGa"></i></th>
                            <th scope="col"><i class="far fa-address-card"  style="font-size: 2rem;" data-toggle="tooltip" data-placement="left" title="Ime OPGa"></i></th>
                            <th scope="col"><i class="fas fa-trash"  style="font-size: 2rem;"data-toggle="tooltip" data-placement="left" title="Ukloni OPG s liste"></i></th>
                        </tr>
                    </thead>
                    <tbody>

                @isset($user_favourites_opg)
                    @if(is_array($user_favourites_opg) || is_object($user_favourites_opg))
                    @foreach($user_favourites_opg as $one_favourite_opg)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>  <a href="{{route('show_opg' , [$one_favourite_opg->id])}}">    <img  src="{{url('avatars/firms_avatars/' . $one_favourite_opg->avatar)}}" alt="profile-picture"></a>  </td>
                            <td>  <a href="{{route('show_opg' , [$one_favourite_opg->id])}}">    {{$one_favourite_opg->firm_name}}</a>  </td>
                            <td>  <a href="{{route('remove_firm_favourite' , [$one_favourite_opg->id])}}">    Ukloni</a>  </td>
                           
                        </tr>
                  @endforeach
                  @endif
                @endisset
        
                </tbody>
                </table>
            </div>
        </div>
        <hr>
    </div>
</section>
@include('footer.footer_all_other')
@endsection
