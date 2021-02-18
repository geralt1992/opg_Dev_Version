@extends('master.master')
@section('content')

<style>



</style>









<!---------------------------------------------------------------------------------------------NAV BAR------------------------------------------------------------------ -->

@include('navbar.navbar')

<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="review_banner" id="review_banner">
    <div class="title">OSTAVI RECENZIJU</div>
    </section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
<section class="review" id="review">

    <form method="POST" action="{{route('save_review')}}">
  @csrf
        <input type="number" name="firm_id" id="firm_id" hidden value="{{$id}}">



        <div class="form-group">
          <label for="title">Naslov</label>
          <input type="text" value="{{ old('title') }}"required name="title" id="title" class="form-control" placeholder="Unesi naslov recenzije" >
        </div>

        <div class="form-group">
            <label for="review">Ostavi recenziju</label>
            <textarea required class="form-control" id="review" name="review" rows="3" placeholder="Ostavi recenziju"></textarea>
          </div>

          <div class="form-group">
            <label for="recomendation">Preporučujem ovaj OPG</label>
            <select required id="recomendation" name="recomendation" class="form-control">
            <option disabled selected value>Odaberite...</option>
              <option value="da">DA</option>
              <option value="ne">NE</option>
            </select>
          </div>


        <div class="form-row">
            <table class="table table-borderless">

                <tbody>
                  <tr>
                    <th scope="row">Uslužnost i pristupačnost</th>
                    <td>
                        <div class="rating">
                        @for($i = 5; $i >= 1; $i--)
                        <input required id="1star-{{$i}}" type="radio" name="star_usluznost" value="{{$i}}"/>
                        <label  for="1star-{{$i}}"></label>
                        @endfor
                        </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">Cijena</th>
                    <td>
                        <div class="rating">
                        @for($i = 5; $i >= 1; $i--)
                        <input  required id="8star-{{$i}}" type="radio" name="star_cijena" value="{{$i}}"/>
                        <label  for="8star-{{$i}}"></label>
                        @endfor
                        </div>
                    </td>
                  </tr>



                  <tr>
                    <th scope="row">Kvaliteta</th>
                    <td>
                        <div class="rating">
                        @for($i = 5; $i >= 1; $i--)
                        <input required  id="3star-{{$i}}" type="radio" name="star_kvaliteta" value="{{$i}}"/>
                        <label  for="3star-{{$i}}"></label>
                        @endfor
                        </div>
                    </td>
                  </tr>




                  <tr>
                    <th scope="row">Sveukupna ocijena</th>
                    <td>
                        <div class="rating">
                        @for($i = 5; $i >= 1; $i--)
                        <input required  id="5star-{{$i}}" type="radio" name="star_sveukupno" value="{{$i}}"/>
                        <label  for="5star-{{$i}}"></label>
                        @endfor
                        </div>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>

        <div class="center">
        <button type="submit" class="btn btn-lg">Recenziraj</button>
        </div>
      </form>


</section>



<!---------------------------------------------------------------------------------------------FOOTER--------------------------------------------------------------->
@include('footer.footer_all_other')

@endsection
