@extends('master.master')
@section('content')

<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->

@include('navbar.navbar')

<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section  class="blog_all_banner" id="blog_all_banner">
    <div class="title">ćUšPAJZ BLOG SVE OBJAVE</div>
</section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
    <section class="pt-5 pb-5 blog_all" id="blog_all">
            <div class="container">
            
@if(is_array($blogs) || is_object($blogs))

@foreach($blogs as $blog)

                <div class="row">

                    <div class="card">
                        <div class="image-data secret_for_mobile">
                        <img src="{{url('avatars/' .$blog->blog_avatar)}}" alt="blog_avatar" class="background-image">
                           
                            <div class="publication-details">
                            <a href="{{route('show_blog' , [$blog->id ])}}" class="author"> <i class="fas fa-user"></i> Marin Sabljo</a>
                                <span class="date"> <i class="fas fa-calendar-alt"></i> {{ Carbon\Carbon::parse($blog->created_at)->format('d, m, Y') }}</span>
                            </div>
                        </div>
                        <div class="post-data">
                            <h1 class="title">{{$blog->blog_title}}</h1>
                            <h2 class="subtitle">Pročitajte naš novi blog</h2>
                            <p class="descreption"> {{ \Illuminate\Support\Str::limit($blog->blog_content, 300, '...') }}</p>
                            <div class="cta">
                            <a href="{{route('show_blog' ,  [$blog->id ])}}">Pročitaj više &rarr;</a>
                            </div>
                        </div>
                    </div>
                
                </div>

@endforeach
@endif

            </div>
       </section>
<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->
@include('footer.footer_all_other')
@endsection