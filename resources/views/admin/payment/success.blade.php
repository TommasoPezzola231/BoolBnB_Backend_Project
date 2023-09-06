@extends('layouts.admin')

@section('content')

<div class="my-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-badge bg-success">
                <div class="card-body">
                    <h1 class="card-title">Pagamento efftuato con successo</h1>
                    <p class="card-text">Grazie per il tuo pagamento. Adesso il tuo appartamento è in evidenza</p>
                    <a href="{{ route('admin.apartments.index') }}" class="text-decoration-none text-dark">Torna alla lista degli appartamenti</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
