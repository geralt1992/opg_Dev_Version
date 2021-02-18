@extends('master.master')
@section('content')
<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->

@include('navbar.navbar')

<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="blog_banner" id="blog_banner">
  <div class="title">ćUšPAJZ BLOG</div>
</section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
    <section class="pt-5 pb-5 blog" id="blog" style=" font-family: 'Noto Sans', sans-serif;">
        <div class="container">
            <div class="row">
              <div class="col-lg-7 mb-4">

              @if(is_array($blog) || is_object($blog))
              <img src="{{url('avatars/' .$blog->blog_avatar)}}" alt="blog_avatar" class="img-fluid rounded mb-3">
                <h2> {{$blog->blog_title}}</h2>
                <p class="mt-4">{{$blog->blog_content}}</p>
                <div class="d-flex text-small author_time_center">
                    <a href="{{route('blog_all')}}"> {{$blog->auth_personals_info}} -</a>
                    <span class="text-muted ml-1"> {{ Carbon\Carbon::parse($blog->created_at)->format('d, m, Y') }}</span>
                </div>
              @endif
              </div>

              <div class="col-lg-5 ">
                <ul class="list-unstyled">

              @if(is_array($blog_sidebar) || is_object($blog_sidebar))
              @foreach($blog_sidebar as $blog)

                <li class="row mb-4">
                  <a  href="{{route('show_blog' ,  [$blog->id ])}}" class="col-3">
                    <img src="{{url('avatars/' .$blog->blog_avatar)}}" alt="blog_avatar" class="rounded img-fluid">
                  </a>
                  <div class="col-9">
                    <a  href="{{route('show_blog' ,  [$blog->id ])}}">
                      <h6 class="mb-3 h5 text-dark"> {{ \Illuminate\Support\Str::limit($blog->blog_content, 40, '...') }}</h6>
                    </a>
                    <div class="d-flex text-small">
                        <a href="{{route('blog_all')}}">MARIN SABLJO - </a>
                        <span class="text-muted ml-1"> {{ Carbon\Carbon::parse($blog->created_at)->format('d, m, Y') }}</span>
                    </div>
                  </div>
                </li>

              @endforeach
              @endif

              <li class="row mb-4">
                <div class="col-12" style="font-size: 1.5rem;">
                 <a href="{{route('blog_all')}}" style="text-decoration: none;"> Prikaži cijeli blog </a>
                </div>
              </li>

            </ul>
              </div>

            </div>
          </div>
          </section>
<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->
@include('footer.footer_all_other')
@endsection
