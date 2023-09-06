@extends('layouts.admin')

@section('content')

<div class="my-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Pagamento efftuato con successo</h1>
                    <p class="card-text">Grazie per il tuo pagamento. Adesso il tuo appartamento è in evidenza</p>
                    <a href="{{ route('admin.apartments.index') }}" class="btn btn-primary">Torna alla lista degli appartamenti</a>
                </div>
                <div class="card-badge bg-success">Success</div>
            </div>
        </div>
    </div>
</div>

@endsection
