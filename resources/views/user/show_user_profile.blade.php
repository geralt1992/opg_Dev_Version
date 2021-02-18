@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->
@include('navbar.navbar')
<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

@foreach($user_profile as $user_data)
         
@endforeach

<section class="user_main_banner" id="user_main_banner">
    <div class="title">{{$user_data->name}} {{$user_data->last_name}}</div>
</section>
<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->


<section class="pt-5 pb-5 user_main" id="user_main">
  <div class="container">
      <div class="row">
                @include('user_sidebar.sidebar')
        <div class="col-lg-7 mb-4 shadow user_search">
          <h4 style="margin-bottom:2rem; text-align: center;">Moj profil</h4>
    

         
          <form action="{{route('update_user_info')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="subtitle" for="name">IME</label>
                    <input type="text" class="form-control" style="border-left: 9px solid #D92139;" required height="55" name="name" id="name" placeholder="{{$user_data->name}}" >
                </div>
                <div class="form-group">
                    <label class="subtitle" for="surname">PREZIME</label>
                    <input type="text" class="form-control " style="border-left: 9px solid #D92139;" required height="55" name="surname" id="surname" placeholder="{{$user_data->last_name}}" >
                    </div>
                   

                    <div class="form-group">
                    <label class="subtitle" for="old_password">Upiši trenutnu lozinku</label>
                    <input type="text" class="form-control " style="border-left: 9px solid #D92139;" required height="55" name="old_password" id="old_password" placeholder="Unesi novu lozinku" >
                    </div>

                    <div class="form-group">
                    <label class="subtitle" for="new_password">Upiši novu lozinku</label>
                    <input type="text" class="form-control " style="border-left: 9px solid #D92139;" required  height="55" name="new_password" id="new_password" placeholder="Ponovi novu lozinku" >
                    </div>
                    
                <div class="form-group">
                    <label class="subtitle" for="email">E-MAIL</label>
                    <input type="email" class="form-control " required height="55" name="email" id="email" placeholder="{{$user_data->email}}" >
                    </div>

                    <div class="form-group">
                  <label for="profile_avatar" class="subtitle">UNESI NOVU PROFILNU SLIKU</label>
                  <input type="file"  required class="form-control-file" id="profile_avatar" name="profile_avatar">
                </div>
                <div class="center" style="margin-bottom: 1rem;">
                        <button type="submit" title="PAZI! Kada mjenjaš podatke, moraš popuniti cijeli formular jer svako prazno polje ce izbrisati postojeći podatak" class="btn btn-lg">IZMIJENI</button>
                </div>
            </form>
          
    </div>

    @if($user_data->avatar !=  0)
      <div class="col-lg-2 mb-4  user_search">
        <h5 style="margin-bottom:2rem;">Moj profilna slika</h5>
        <img  data-toggle="tooltip" data-placement="left" title="Ovo je Vaša trenutna profilna slika"
        src="{{url('avatars/user_avatars/' . $user_data->avatar)}}" class="img-fluid rounded  mb-7" width="200" height="100"  alt="avatar_profile-picture">
      </div>      
    @else
      <div class="col-lg-2 mb-4  user_search">
        <h5 style="margin-bottom:2rem;">Moj profilna slika</h5>
        <img  data-toggle="tooltip" data-placement="left" title="Ovo je Vaša trenutna profilna slika"
        src="{{url('avatars/user_avatars/bez_avatara.png')}}" class="img-fluid rounded  mb-7" width="200" height="100"  alt="avatar_profile-picture">
      </div>
      @endif

    </div>
    </div>
  
</section>
@include('footer.footer_all_other')

@endsection
