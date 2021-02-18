@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->
@include('navbar.navbar')
<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="user_main_banner" id="user_main_banner">
  <div class="title">galerija</div>
</section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
<section class="pt-5 pb-5 user_main user_opg_gallery" id="user_opg_gallery">
  <div class="container">
    <div class="row">

            @include('user_sidebar.sidebar')


            @isset($create_ur_firm)
                    <a href="{{route('create_opg')}}"style="color:balck; font-size:2rem; font-weight:bold;">KREIRAJ MOJ OPG!!! - klikni me!</a>
                @endisset

                

              <div class="col-lg-9 mb-4 shadow user_image">
              <h4 style="margin-bottom:2rem;">Dodaj slike svoga OPG-a</h4>
                <div class="row text-center text-lg-left">
              
                    <div class="col-lg-3 col-md-4 col-6">
                   
         <a href="#" class="d-block mb-4 h-100"  >
                            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/ppE5mjUS8t0/400x300" alt="example_picture_for_gallerie">
                            Primjer slika</a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6">             
          <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/1dGMs4hhcVA/400x300" alt="example_picture_for_gallerie">
                            Primjer slika</a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6">
          <a href="#" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/IQVFVH0ajag/400x300" alt="example_picture_for_gallerie">
                            Primjer slika</a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6">              
           <a href="#" class="d-block mb-4 h-100" > 
                            <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/xMh_ww8HN_Q/400x300" alt="example_picture_for_gallerie">
                            Primjer slika </a>
                    </div>


                @isset($user_opg_gallery)

                @foreach($user_opg_gallery as $user_opg_gallery_image)                                                     
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="delete_pic"  data-toggle="tooltip" data-placement="left" title="Izbrisi sliku"  style="margin-bottom:1rem;"> <a href="{{route('delete_user_opg_images' , [$id = $user_opg_gallery_image->id])}}" ><i style="font-size:22px;" class="fas fa-trash"></i></a></div> 
           <a data-toggle="tooltip" data-placement="left" title="Uvećaj sliku" href="{{url('avatars/galleries_avatars/' . $user_opg_gallery_image->gallerie_avatar)}}" class="d-block mb-4 h-100 gallery-item" target=”_blank” class="test-popup-link"> 
                            <img  class="img-fluid img-thumbnail gallery-item" src="{{url('avatars/galleries_avatars/' . $user_opg_gallery_image->gallerie_avatar)}}" alt="user_opg_gallery_image">
                             </a>
                    </div>
                @endforeach
                @endisset
   
                  </div>
                  <hr>
                    <form action="{{route('save_user_opg_images')}}" method="POST" style="margin-top: 2rem;" enctype="multipart/form-data">
                        @csrf
                        <label for="opg_gallery">POSTAVI SLIKE SVOG OPG-a</label> <br>
                        <input type="file" id="opg_gallery" name="opg_gallery" required multiple> <br>

                        <button type="submit" class="btn btn-lg" style="margin-bottom:2rem;" >SPREMI</button>
                    </form>
            </div>
     </div>
    </div>
</section>


@include('footer.footer_all_other')
@endsection
