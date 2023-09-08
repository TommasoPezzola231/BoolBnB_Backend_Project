@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-12 p-2">

                <div class="col-12">
                    <h1 class="text-center text-dark my-3">
                        {{ __('Benvenuto') }} {{ auth()->user()->name }}!
                        <span><h2>Alla tua dashboard di</h2></span>
                        <span><h1 class="text-center my_color_heaer_transarent">{{ __('BoolBnb') }}</h1></span>
                    </h1>
                </div>

                <div class="col-10 mx-auto my-5">
                    <div class="col-12 mx-auto">
                        <p class="text-dark text-center">Siamo felici di averti qui. La tua dashboard è il luogo dove gestire i tuoi appartamenti sulla piattaforma. Ecco alcune delle cose che puoi fare:</p>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 mb-3">
                            <div class="card shadow h-100 cursor-pointer">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">Caricare Appartamenti</h5>
                                    <p class="card-text flex-grow-1">Puoi aggiungere nuovi appartamenti alla piattaforma per renderli visibili agli utenti interessati</p>
                                    <div class="d-flex align-items-center">
                                        <a class="btn my_btn" href="{{ route('admin.apartments.create') }}"> {{ __('Carica Appartamento') }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <div class="card shadow h-100 cursor-pointer">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">Modificare i Dettagli degli Appartamenti</h5>
                                    <p class="card-text flex-grow-1">Hai la flessibilità di aggiornare le informazioni sugli appartamenti esistenti in qualsiasi momento</p>
                                    <div class="d-flex align-items-center">
                                        <a class="btn my_btn" href="{{ route('admin.apartments.index') }}"> {{ __('Effettua Modifiche') }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <div class="card shadow h-100 cursor-pointer">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">Mettere gli Appartamenti in Evidenza</h5>
                                    <p class="card-text flex-grow-1">Per aumentare la visibilità, puoi mettere in evidenza alcuni appartamenti per farli vedere a più utenti possibili</p>
                                    <div class="d-flex align-items-center">
                                        <a class="btn my_btn" href="{{ route('admin.sponsorships.index') }}"> {{ __('Sponsorizza i tuoi Appartamenti') }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 mb-3">
                            <div class="card shadow h-100 cursor-pointer">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">Leggere i Messaggi degli Utenti Interessati</h5>
                                    <p class="card-text flex-grow-1">Gli utenti interessati ai tuoi appartamenti possono inviarti messaggi, e qui puoi leggerli e rispondere</p>
                                    <div class="d-flex align-items-center">
                                        <a class="btn my_btn" href="{{ route('admin.messages.index') }}"> {{ __('Vai a Messaggi') }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mx-auto">
                        <div class="d-flex justify-center">
                            <img src="http://localhost:8000/images/logo/Bool_Bnb_Black.png" alt="logo" class="img-fluid mx-auto">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
