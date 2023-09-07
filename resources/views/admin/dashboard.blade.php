@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <h1 class="text-center text-white">{{ __('BoolBnb') }}</h1>

                <div class="container">
                    @if (session('status'))
                    <div role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h2 class="text-center text-white my-3">{{ __('Benvenuto,') }} {{ auth()->user()->name }}!</h2>
                    <div class="fs-4 text-white">Siamo felici di averti qui. La tua dashboard è il luogo dove gestire i tuoi appartamenti sulla piattaforma. Ecco alcune delle cose che puoi fare:</div>
                    <ul>
                        <li class="fs-5 text-white mt-3">
                            Caricare Appartamenti: Puoi aggiungere nuovi appartamenti alla piattaforma per renderli visibili agli utenti interessati.
                        </li>
                        <li class="fs-5 text-white mt-3">
                            Modificare i Dettagli degli Appartamenti: Hai la flessibilità di aggiornare le informazioni sugli appartamenti esistenti in qualsiasi momento.
                        </li>
                        <li class="fs-5 text-white mt-3">
                            Mettere gli Appartamenti in Evidenza: Per aumentare la visibilità, puoi mettere in evidenza alcuni appartamenti per farli vedere a più utenti possibili.
                        </li>
                        <li class="fs-5 text-white mt-3">
                            Leggere i Messaggi degli Utenti Interessati: Gli utenti interessati ai tuoi appartamenti possono inviarti messaggi, e qui puoi leggerli e rispondere.
                        </li>
                    </ul>
                    <div class="d-flex justify-center">
                        <img src="http://localhost:8000/images/logo/Bool_Bnb_White.png" alt="logo" class="mx-auto">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
