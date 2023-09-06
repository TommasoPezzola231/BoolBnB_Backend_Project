@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Errore nel pagamento</h1>
                <p>Si è verificato un errore nel pagamento. Riprova</p>
                <a href="{{ route('admin.sponsorships.index') }}" class="btn btn-primary">Torna alla pagina del pagamento</a>
            </div>
        </div>
    </div>

@endsection
