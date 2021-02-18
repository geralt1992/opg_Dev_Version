@extends('master.master')
@section('content')
<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->

@include('navbar.navbar')

<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->
<section class="help_banner" id="help_banner">
    <div class="title">POMOĆ</div>
    </section>
<!---------------------------------------------------------------------------------------------SEARCH------------------------------------------------------------------ -->
<section class="help" id="help">

<div class="masthead">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">
        <div class="title_help" style="margin-bottom: 5rem;" > <h1>Upišite svoj problem</h1></div>

    <form method="POST" action="{{route('save_help_question')}}" >
    @csrf  
      <div class="form-group">
        <label for="subject">Vaš problem</label>
          <p>Odgovorit ćemo Vam putem e-maila u najkraćem mogućem roku!</p>
        <textarea required value="{{ old('subject') }}" class="form-control" id="subject" name="subject" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">POŠALJI</button>
    </form>
      </div>
    </div>
  </div>
</div>
</section>
<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->
@include('footer.footer_all_other')
@endsection
























<style>




/*-------------------------------------------------------------------OUR MISSION---------------------------------------------------------------------------------------------*/




/*-------------------------------------------------------------------MEDIA---------------------------------------------------------------------------------------------*/



@media screen and (max-width:1050px){
    
.title_help{
    display:none;
}

}




@media screen and (max-width: 560px){
   
.title_help{
    display:none;
}

}



</style>