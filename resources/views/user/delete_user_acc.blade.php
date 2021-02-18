@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->
@include('navbar.navbar')
<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="user_main_banner" id="user_main_banner">
    <div class="title">OBRIŠI RAČUN</div>
 </section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
<section class="pt-5 pb-5 opg" id="opg">
  <div class="container">
      <div class="row">
                @include('user_sidebar.sidebar')
        <div class="col-lg-9 mb-4 shadow user_search">
          <h4 style="margin-bottom:2rem;">Obriši moj račun</h4>

          <form class="form-inline" action="{{route('delete_user') }}" method="POST">
          @csrf 
         
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Lozinka</label>
    <input type="password"  name="password" class="form-control" id="password"  required placeholder="Unesi svoju lozinku">
  </div>
  <button type="submit" class="btn  mb-2">Obriši račun</button>
</form>
  
</section>
@include('footer.footer_all_other')
@endsection
