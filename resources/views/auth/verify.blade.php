@extends('layouts-chat.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Potvrdite svoju e-mail adresu - ĆUŠPAJZ.HR') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Novi verifikacijski link je poslan na tvoju adresu') }}
                        </div>
                    @endif

                    {{ __('Prije nego li nastavite, molim vas potvrdite svoju e-mail adresu, link je poslan na Vaš e-mail') }}
                    {{ __('Ako niste primili e-mail za potvrdu') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('kliknite ovdje kako bi dobili novi e-mail za potvrdu') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
