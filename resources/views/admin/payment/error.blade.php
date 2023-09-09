@extends('layouts.admin')

@section('content')
    <div class="my-3">
        <div class="row">
            <div class="col-8 col-lg-6 col-xl-4 mt-5 mx-auto">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="fa-solid fa-circle-xmark text-danger me-3 fs-3"></i>
                        <span class="fs-3">Errore nel pagamento!</span>
                        <div class="fs-5 mt-2">La transazione non è andata a buon fine. La preghiamo di riprovare.</div>
                        <a href="{{ route('admin.apartments.index') }}" class="btn btn-outline-danger mt-3">Torna alla pagina del pagamento.</a>
                    </div>
                </div>
            </col-8>
        </div>
    </div>
@endsection

