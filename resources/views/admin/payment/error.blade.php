@extends('layouts.admin')

@section('content')
    <div class="my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-badge bg-danger">
                    <div class="card-body">
                        <h1>Errore nel pagamento</h1>
                        <p>Si è verificato un errore nel pagamento. Riprova</p>
                        <a href="{{ route('admin.sponsorships.index') }}" class="text-decoration-none text-dark">Torna alla pagina del pagamento</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
