
<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->
<section id="footer">

    <div class="container">
        <div class="row">

            <div class="col-md-3 footer-box">
            <p><b>O NAMA</b></p>
                <a href="{{route('show_about_us')}}"><p>O nama</p></a>
                <a href="{{route('show_donation_page')}}"><p>Pomozite nam</p></a>
                <a href="#"><p>Često postavljena pitanja</p></a>
                <a href="{{route('show_conditions')}}"><p>Uvjeti</p></a>
                <a href="{{route('show_help')}}"><p>Pomoć</p></a>
            </div>

            <div class="col-md-3 footer-box">
                <p><b>MI NA MREŽAMA</b></p>
                <p><i class="fab fa-facebook"></i>Facebook</p>
                <p><i class="fab fa-instagram"></i> Instagram</p>
                <p><i class="fa fa-phone"></i> +385 92 357 5008</p>
                <p><i class="fa fa-envelope"></i> ćušpajz-hr@gmail.com</p>
            </div>

            <div class="col-md-3 footer-box">
                <p><b>KATEGORIJE ARTIKALA</b></p>
                <a href="{{route('show_categories' , [$category = 'povrće'])}}"><p>Povrće</p></a>
                <a href="{{route('show_categories' , [$category = 'voće'])}}"><p>Voće</p></a>
                <a href="{{route('show_categories' , [$category = 'meso'])}}"><p>Meso</p></a>
                <a href="{{route('show_categories' , [$category = 'mliječni proizvodi'])}}"><p>Mliječni proizvodi</p></a>
                <a href="{{route('show_categories' , [$category = 'sokovi'])}}"><p>Sokovi</p></a>
                <a href="{{route('show_categories' , [$category = 'ulja'])}}"><p>Ulja</p></a>
                <a href="{{route('show_categories' , [$category = 'alkoholna pića'])}}"><p>Alkoholna pića</p></a>
                <a href="{{route('show_categories' , [$category = 'orašasti plodovi'])}}"><p>Orašasti plodovi</p></a>
                <a href="{{route('show_categories' , [$category = 'ostalo'])}}"><p>Ostali proizvodi</p></a>
            </div>

             <div class="col-md-3 footer-box">
             <p><b>BRZI IZBORNIK</b></p>
                <a href="{{route('show_main_page')}}"><p>Za kupce i prodavače</p></a>
                <a href="{{route('show_main_page')}}"><p>Kategorije</p></a>
                <a href="{{route('blog_all')}}"><p>Blog</p></a>
                <a href="{{route('show_donation_page')}}"><p>Pomozite nam</p></a>
                <a href="{{route('show_main_page')}}"><button type="" style="background-color:red;" class="btn btn-primary">Na vrh!</button></a>
             </div>

    </div>

    </div>
    </section>
