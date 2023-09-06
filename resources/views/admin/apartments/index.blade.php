@extends('layouts.admin')

@section('content')
    <section>
        <div class="row">
            <h2 class="my-3">I tuoi appartamenti</h2>
            <hr>
        </div>
        <div class="row mx-auto d-flex flex-wrap">
            @if ($apartments->isEmpty())
                <div class="col-12 text-center">
                    <h3>Non hai ancora aggiunto nessun appartamento.</h3>
                    <a class=" text-decoration-none text-white" href="{{ route('admin.apartments.create') }}">Aggiungi un appartamento</a>
                </div>
            @else
                @foreach ($apartments as $apartment)
                <div class="col-lg-4 col-md-6 col-sm-12 p-3">
                    <div class="card-apartment shadow p-1 rounded-4 m-3 d-flex flex-column" style="height: 100%;">
                        <a href="{{ route("admin.apartments.show", $apartment->id) }}">
                            <div class="m-2">
                                @if ($apartment->full_path_principal_image)
                                    <img src="{{ $apartment->full_path_principal_image }}" class="rounded-4" alt="{{ $apartment->title }}">
                                @else
                                    <img src="https://www.signfix.com.au/wp-content/uploads/2017/09/placeholder-600x400.png" class="rounded-4" alt="Placeholder Image">
                                @endif
                                <div class="title m-2 w-100">
                                    {{ $apartment->title }}
                                </div>
                                <p class="ms-2 fw-light text-secondary">
                                    {{ $apartment->address }}, {{ $apartment->city }}
                                </p>
                                @if ($apartment->visible)
                                    <div class="d-flex align-items-center gap-2">
                                        Visibile <span class="fa-solid fa-eye"></span>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center gap-2">
                                        Non visibile <span class="fa-solid fa-eye-slash"></span>
                                    </div>
                                @endif
                                {{-- sponsor si o no --}}
                                @if ($apartment->sponsorships->isNotEmpty())
                                    <div class="d-flex align-items-center gap-2">
                                        Sponsorizzato <span class="fas fa-award"></span>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center gap-2">
                                        Non sponsorizzato
                                    </div>
                                @endif
                            </div>
                        </a>
                        {{-- if is not sponsorized show button sponsorize else show sponsorized until date and button to sponsorize again  --}}
                        @if ($apartment->sponsorships->isEmpty())
                            <div class="mt-auto d-flex justify-content-center p-2">
                                <a href="{{ route('admin.sponsorships.index', ['apartment_id' => $apartment->id]) }}" class="btn btn-primary">Sponsorizza</a>
                            </div>
                        @else
                            <div class="mt-auto d-flex justify-content-center p-2">
                                <a href="{{ route('admin.sponsorships.index') }}" class="btn btn-primary">Allunga la tua sponsorizzazione</a>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
