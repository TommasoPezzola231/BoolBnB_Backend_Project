@extends('layouts.admin')

@section('content')

<div class="my-3">
    <div class="row">
        <div class="col-8 col-lg-6 col-xl-4 mt-5 mx-auto">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fa-solid fa-circle-check text-success me-3 fs-3"></i>
                    <span class="fs-3">Pagamento effettuato con successo</span>
                    <div class="fs-5 mt-2">Adesso il tuo appartamento è in evidenza!</div>
                    <a href="{{ route('admin.apartments.index') }}" class="text-decoration-none btn btn-outline-success mt-3">Torna alla lista degli appartamenti</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
