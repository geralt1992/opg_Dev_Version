@extends('master.master')
@section('content')
<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->



<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->
<section class="help_banner" id="help_banner">
    <div class="title">Spremi novi blog sadržaj</div>
    </section>
<!---------------------------------------------------------------------------------------------SEARCH------------------------------------------------------------------ -->
<section>


  <div class="container ">
    <div class="row">
      <div class="col-12">
            <form style="margin-top:2rem;" method="POST" action="{{route('save_new_blog')}}" enctype="multipart/form-data">
            @csrf
            
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="author_info"> <h5>Ime i prezime autora</h5></label>
            <input required type="text" class="form-control" id="author_info" name="author_info" placeholder="author_info">
            </div>
            <div class="form-group col-md-6">
            <label for="blog_title"><h5>Naslov bloga</h5></label>
            <input required type="text" class="form-control" id="blog_title" name="blog_title" placeholder="blog_title">
            </div>
        </div>

            <div class="form-group">
                <label for="content"><h5>Sadržaj</h5></label>
                <textarea required class="form-control" id="content" name="content" rows="20" col="2"></textarea>
            </div>

            <input type="file" id="avatar" name="avatar" required > <br>

            <button type="submit" class="btn btn-primary" style="float:right;">SPREMI</button>
            </form>
      </div>
    </div>
  </div>

</section>
<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->

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