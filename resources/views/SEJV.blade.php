ZA SUTRA

    linkaj stvari MEĐUSOBNO

APP

        caching - mozda rezultate, ali to tek nakon puštanja u proizvod

    PROVJERI RESPONSIVE SVAKE STRANICE S "RESPNOVISE" -  + pripazi jos provjeri login recaptcha - na kraju!

    LINKAJ SI STRANICE MEĐUSOBNO DOSTA U APPU zbg seoa

    PROBAT NAPRAVITI FEKTORI NA BAZI OD 100 000 KORISNIKA



MARKETING

    DATUM OBJAVE PRVE STRANICE - komperaj s google analitiksom

    FB stranica
    INSTAGRAM stranica
    TWITER stranica
    GMAIL akaunt
    YOUTUBE akaunt

    OBJAVI SE NA FORUMIMA!

    GOOGLE ADS - DIGITALNA GARAZA PROUČI

    go get funding

    NATJECANJA, NAGRADE, KVIZOVI...
        šaljite nam slike svojih proizvoda, najboljeg nagrađujemo bonom od 100 kuna!

    PROBAJ KONTAKTIRATI VLADU ZA POMOĆ! - makar preporuka

    SEO
        u blogu koristi riječi cuspajz.hr kao logo ili nesto tako!
        blog na foru

    PROBAJ SMISLITI SLOGAN KEĆI! "Zdravo, ukusno i NAŠE!"

    SKOPAJ STRANICE S KOJIMA MOZES SURADJIVATI!

    ODGOVORI KUPCIMA I OPGOVCIMA "ŠTO JA IMAM OD TOGA!"

    NAPRAVI NEKAKAV LOGO


    SAVJETI!
            umjesto hrvatskog koristi riječ "naših" "našeg"!!!
            Draw out the Suspense for As Long As You Can
            https://www.quora.com/How-can-I-market-a-web-application-and-get-more-users







LAUNCH - 21. 3. 2021.+

MAIL PODEŠEN ZA SLANJE S GMAILA
SAMO IZMEJNI USERNAME NA CUSPAJZOV GMAIL I NJEGOVU LOZINKU


MAIL_DRIVER=smtp
MAIL_HOST=smtp.googlemail.com
MAIL_PORT=465
MAIL_USERNAME=marin.sabljo@gmail.com
MAIL_PASSWORD=geralt199
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=marin.sabljo@gmail.com
MAIL_FROM_NAME="${APP_NAME}"







modal odrađen!!!



/*-------------------------------------------------------------------modal---------------------------------------------------------------------------------------------*/
#modal {
    height: 100%;
    width: 100%;
    display: block;
    position: relative;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 9 !important;
    overflow: hidden;
}

#moda_cont {
    background: linear-gradient(
        to right bottom,
        rgba(255, 255, 255, 0.8),
        rgba(255, 255, 255, 0.2)
    );
    color: white;
    border-radius: 2.5rem;
    z-index: 2;
    backdrop-filter: blur(2rem);
    display: flex;
    width: 50%;
    margin: 8% auto;
    padding: 3rem;
    height: auto;
    position: relative;
    letter-spacing: 1px;
}






<script>

    if(localStorage.getItem('modalee') === null){
        let modale = document.getElementById('modal');
        modale.style.display = 'block';

        /////////////////

        let body =  document.querySelector('body');
        body.style.overflow = "hidden";

        var modalBtn = document.getElementById('modbtn');
        modalBtn.disabled = true;


        setTimeout(() => {
            var modalBtn = document.getElementById('modbtn');
            modalBtn.innerHTML = 'Kreni za 4'
        }, 2000);

        setTimeout(() => {
            var modalBtn = document.getElementById('modbtn');
            modalBtn.innerHTML = 'Kreni za 3'
        }, 3000);

        setTimeout(() => {
            var modalBtn = document.getElementById('modbtn');
            modalBtn.innerHTML = 'Kreni za 2'
        }, 4000);

        setTimeout(() => {
            var modalBtn = document.getElementById('modbtn');
            modalBtn.innerHTML = 'Kreni za 1'
        }, 5000);

        setTimeout(() => {
            var modalBtn = document.getElementById('modbtn');
            modalBtn.innerHTML = 'Kreni!'
            modalBtn.disabled = false;
            body.style.overflow = "";
        }, 6000);

    /////////////////

        modalBtn.addEventListener('click' , () => {
            let modall = true;
            localStorage.setItem('modalee' , modall);

            let modale = document.getElementById('modal');
            modale.style.display = 'none';
        })
    }else{
        let modale = document.getElementById('modal');
        modale.style.display = 'none';
    }

</script>





<div id="modal">
    <div id="moda_cont">
            <div id="modal_color" >
            <h1>ĆUŠPAJZ.HR</h1>
                <hr>
                <div class="d-flex justify-content">
                    <a href="{{route('show_about_us')}}" target="_blank" style="color:black;">
                        <p><b>Kupite i Prodajte</b> domaće proizvode putem platforme! - klikni me!</p>
                    </a>
                </div>
                <hr>
                <div style="float:center;">
                    <h2>Za Prodavače - <br> Do kraja 2021. godine<br>potpuno besplatno!</br></h2>
                    <h3>DOBIVATE svoj ONLINE ŠTAND</b></h3>
                    <hr>
                </div>

                <div style="float:right;">
                    <h6>Bez ikakvih obveza i plaćanja, isprobajte i poboljšajte svoju prodaju!</h6>
                </div>

                    <div id="modal_btnn" style="float:right;">
                        <button id="modbtn" class="btn btn-small" style="color:white;">KRENI ZA 5</button>
                    </div>
            </div>


    </div>
</div>


