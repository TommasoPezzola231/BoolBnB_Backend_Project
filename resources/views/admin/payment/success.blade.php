@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Pagamento efftuato con successo</h1>
                <p>Grazie per il tuo pagamento. Adesso il tuo appartamento è in evidenza</p>
                <a href="{{ route('admin.apartments.index') }}" class="btn btn-primary">Torna alla lista degli appartamenti</a>
            </div>
        </div>
    </div>
@endsection
