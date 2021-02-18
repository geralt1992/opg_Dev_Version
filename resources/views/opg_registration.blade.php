@extends('master.master')
@section('content')


<!---------------------------------------------------------------------------------------------BANNERS------------------------------------------------------------------ -->

<section class="user_main_banner" id="user_main_banner">
    <div class="title">KREIRAJ SVOJ OPG</div>
 </section>

<!---------------------------------------------------------------------------------------------OPG------------------------------------------------------------------ -->
<section class="pt-5 pb-5 opg" id="opg">
  <div class="container">
      <div class="row">
              
        <div class="col-lg-12 mb-4 shadow user_search">
          <h4 style="margin-bottom:2rem;">Stvori moj OPG</h4>
         
          
          <form action="{{route('store_new_firm')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="text" name="user_id" hidden value="{{Auth::id()}}">


            <div class="form-row">
            <div class="form-group col-md-12">
              <label for="firm_name" class="subtitle">OPG IME</label>
              <input required type="text" class="form-control" style="border-left: 9px solid #D92139;" value="{{ old('firm_name') }}" height="55" name="firm_name" id="firm_name" placeholder="" >
            </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="owner" class="subtitle">VLASNIK</label>
                <input required type="text" class="form-control" style="border-left: 9px solid #D92139;" value="{{ old('owner') }}"  height="55" name="owner" id="owner" placeholder="" >
               </div>
        
            

                <div class="form-group col-md-6">
                  <label for="adress" class="subtitle">ADRESA</label>
                  <input required type="text" class="form-control" style="border-left: 9px solid #D92139;"  value="{{ old('adress') }}" height="55" name="adress" id="adress" placeholder="" >
                </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-12">
                <label for="opg_zupanija" class="subtitle">ŽUPANIJA</label>
                  <select required id="opg_zupanija" name="opg_zupanija" class="form-control">
                  <option selected>Odaberi županiju</option>
                    <option value="Osječko Barnjska">Osječko Barnjska</option>
                    <option value="Brodsko-Posavska">Brodsko-Posavska</option>
                    <option value="Dubrovnik-Neretva">Dubrovnik-Neretva</option>
                    <option value="Bjelovar-Bilogora">Bjelovar-Bilogora</option>
                    <option value="Istra">Istra</option>
                    <option value="Karlovac">Karlovac</option>
                    <option value="Koprivnica-Križevci">Koprivnica-Križevci</option>
                    <option value="Krapina-Zagorje">Krapina-Zagorje</option>
                    <option value="Lika-Senj">Lika-Senj</option>
                    <option value="Međimurje">Međimurje</option>
                    <option value="Požega-Slavonia">Požega-Slavonia</option>
                    <option value="Primorje-Gorski Kotar">Primorje-Gorski Kotar</option>
                    <option value="Šibenik-Knin">Šibenik-Knin</option>
                    <option value="Sisak-Moslavina">Sisak-Moslavina</option>
                    <option value="Split-Dalmatia">Split-Dalmatia</option>
                    <option value="Varaždin">Varaždin</option>
                    <option value="Virovitica-Podravina">Virovitica-Podravina</option>
                    <option value="Vukovar-Srijem">Vukovar-Srijem</option>
                    <option value="Zadar">Zadar</option>
                    <option value="Zagreb County">Zagreb County</option>
                    <option value=">City of Zagreb">City of Zagreb</option>
                  </select>
              </div>
              </div>
            <br>


            <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="social_network" class="subtitle">DRUŠTVENE MREŽE - MAIL, FACEBOOK, TWITTER...</label>
                  <textarea   value="{{ old('social_network') }}"  data-toggle="tooltip" data-placement="left" title="Molim kopirajte linkove profila društvenih mreža ili link svoje web stranice (ukoliko ih imate)!" class="form-control" id="social_network" name="social_network" rows="3" placeholder=""></textarea>
                </div>

                <div class="form-group col-md-12">
                  <label for="what_we_do" class="subtitle">O NAMA</label>
                  <textarea  class="form-control" value="{{ old('subtitle') }}"  data-toggle="tooltip" data-placement="left" title="Opiši čime se Vaš OPG bavi, kakve uvjete ima i slično! DO 250 RIJEČI" id="what_we_do" name="what_we_do" rows="3" placeholder=""></textarea>
                </div>

                <div class="form-group col-md-12">
                  <label for="opg_avatar" class="subtitle">UNESI PROFILNU SLIKU OPG-a</label>
                  <input required type="file"  class="form-control-file" id="opg_avatar" name="opg_avatar">
                </div>


                </div>
                <div class="center">
                 <a href=""> <button type="submit" class="btn btn-lg" style="margin-bottom:2rem; color:white;">KREIRAJ</button></a>
                </div>
          </form>
          
    </div>
  </div>
 
</section>

@endsection
