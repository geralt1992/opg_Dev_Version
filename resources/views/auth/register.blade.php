@extends('layouts-chat.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registriracija') }}</div>

                <div class="card-body">

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ime') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Obvezno"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Prezime') }}</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') }}" name="surname"  placeholder="Obvezno" required>
                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Korisničko ime') }}</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" required placeholder="Obvezno" >
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Addresa') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Obvezno" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="owner" class="col-md-4 col-form-label text-md-right">{{ __('Vlasnik sam OPG-a') }}</label>
                            <div class="col-md-6">
                                <select id="owner" type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" required placeholder="Obvezno" >
                                    <option selected value="Kupac">NE</option>
                                    <option value="Vlasnik">DA</option>
                                </select>
                                    @error('owner') 
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile_picture" class="col-md-4 col-form-label text-md-right">{{ __('Unesi profilnu sliku') }}</label>
                            <div class="col-md-6">
                            <input type="file" class="@error('profile_picture') is-invalid @enderror" id="profile_picture" name="profile_picture">
                                @error('profile_picture')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

           
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Lozinka') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Obvezno" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Ponovi lozinku') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Obvezno" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Da li prihvaćate <a href="{{route('show_conditions')}}">uvjete korištenja? </a>  </label>
                            <div class="form-check"> 
                                <input type="checkbox" value="1" name="conditions" id="conditions" required>
                                <label  for="conditions">
                                Prihvaćam uvjete korištenja
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <button class="btn btn-primary g-recaptcha">
                                    {{ __('Registriraj se') }}
                                </button>

                                <input type="hidden" name="recaptcha_response" id="recaptcha_response" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection