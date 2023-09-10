@extends('layouts.app')

@section('content')
    <div class="col-12 d-flex flex-column justify-content-end align-items-center text-center p-2 cursor-pointer">
        <h1 class="mt-5">Errore 401</h1>
        <h2>Accesso Non Autorizzato</h2>
        <span class="fa-solid fa-triangle-exclamation my_color"></span>
        <p class="mt-3 my_color">Spiacenti, non hai le autorizzazioni necessarie per accedere a questa pagina</p>
        <img src="{{ asset('images/logo/Bool_Bnb_Black.png') }}" alt="logo" class="img-fluid my-1" style="max-width: 200px;">

        <div class="d-flex justify-content-between gap-4 mb-5">
            <a href="{{ route('login') }}" class="btn my_btn">Torna alla home</a>
        </div>
    </div>
@endsection
