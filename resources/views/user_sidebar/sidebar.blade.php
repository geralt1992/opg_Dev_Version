
            <div class="col-lg-3 ">
            <ul class="list-unstyled">

            <li class="row mb-4">
                <a href="{{route('show_user_profile')}}" class="col-3">
                <i class="fas fa-user"></i>
                </a>
                <div class="col-9">
                <a href="{{route('show_user_profile')}}">
                    <h4 class="mb-3 h6 text-dark">Korisnički profil</h4>
                </a>
                </div>
            </li>


                <li class="row mb-4">
                <a  href="{{route('chat_all')}}" class="col-3">
                    <i class="far fa-envelope"></i>
                </a>
                <div class="col-9">
                    <a  href="{{route('chat_all')}}">
                    <h4 class="mb-3 h6 text-dark">Moje poruke</h4>
                    </a>
                </div>
                </li>

                @if(Auth::user())
                @if(Auth::user()->is_owner === 'Vlasnik')


            <li class="row mb-4">
                <a  href="{{route('show_user_opg')}}" class="col-3">
                    <i class="fas fa-tractor"></i>
                </a>
                <div class="col-9">
                    <a  href="{{route('show_user_opg')}}">
                    <h4 class="mb-3 h6 text-dark">Moj OPG</h4>
                    </a>
                </div>
                </li>

                <li class="row mb-4">
                <a  href="{{route('show_user_opg')}}" class="col-3">
                    <i class="far fa-images"></i>
                </a>
                <div class="col-9">
                    <a  href="{{route('show_user_opg_images')}}">
                    <h4 class="mb-3 h6 text-dark">Moj OPG - galerija</h4>
                    </a>
                </div>
                </li>

                <li class="row mb-4">
                <a  href="{{route('show_user_products')}}" class="col-3">
                    <i class="fab fa-product-hunt"></i>
                </a>
                <div class="col-9">
                    <a  href="{{route('show_user_products')}}">
                    <h4 class="mb-3 h6 text-dark">Moji proizvodi</h4>
                    </a>
                </div>
                </li>


                @endif
                @endif

                <li class="row mb-4">
                <a  href="{{route('show_user_opg_favourite')}}" class="col-3">
                    <i class="fas fa-heart"></i>
                </a>
                <div class="col-9">
                    <a  href="{{route('show_user_opg_favourite')}}">
                    <h4 class="mb-3 h6 text-dark">Moji favoriti - OPG</h4>
                    </a>
                </div>
                </li>

                <li class="row mb-4">
                <a  href="{{route('show_user_products_favourite')}}" class="col-3">
                    <i class="far fa-heart"></i>
                </a>
                <div class="col-9">
                    <a  href="{{route('show_user_products_favourite')}}">
                    <h4 class="mb-3 h6 text-dark">Moji favoriti - proizvodi</h4>
                    </a>
                </div>
                </li>


                <li class="row mb-4">
                <a  href="{{route('delete_user_profile')}}" class="col-3">
                    <i class="fa fa-trash"></i>
                </a>
                <div class="col-9">
                    <a  href="{{route('delete_user_profile')}}">
                    <h4 class="mb-3 h6 text-dark">Obriši račun</h4>
                    </a>
                </div>
                </li>
        </ul>
            </div>
