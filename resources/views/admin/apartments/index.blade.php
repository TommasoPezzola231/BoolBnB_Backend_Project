@extends('layouts.admin')

@section('content')
    <section class="p-4">
        <div class="row">
            <h2 class="my-3 text-center bold">I Tuoi Appartamenti</h2>
            <hr>
        </div>
        <div class="row mx-auto d-flex flex-wrap">
            @if ($apartments->isEmpty())
                <div class="col-12 text-center">
                    <h3 class="text-white">Non hai ancora aggiunto nessun appartamento.</h3>
                    <button class="btn my_btn mt-2"><a class="text-decoration-none my_link"href="{{ route('admin.apartments.create') }}">Aggiungi un appartamento</a></button>
                </div>
                <div class="col-12 mx-auto">
                    <div class="d-flex justify-center">
                        <img src="http://localhost:8000/images/logo/Bool_Bnb_Black.png" alt="logo" class="img-fluid mx-auto">
                    </div>
                </div>
            @else
                @foreach ($apartments as $apartment)
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 p-3">
                    <div class="card-apartment bg-white p-1 rounded-4 m-3 d-flex flex-column shadow-lg" style="height: 100%;">
                        <a href="{{ route("admin.apartments.show", $apartment->id) }}">
                            <div class="m-2">
                                {{-- immagine --}}
                                <div class="my_img_container">
                                    @if ($apartment->full_path_principal_image)
                                        <img src="{{ $apartment->full_path_principal_image }}" class="rounded-4 img-fluid" alt="{{ $apartment->title }}">
                                    @else
                                        <img src="https://www.signfix.com.au/wp-content/uploads/2017/09/placeholder-600x400.png" class="rounded-4 img-fluid" alt="Placeholder Image">
                                    @endif
                                </div>
                                {{-- titolo --}}
                                <div class="title m-2 w-100 color-primary">
                                    {{ $apartment->title }}
                                </div>
                                {{-- indirizzo --}}
                                <p class="ms-2 fw-light text-secondary">
                                    {{ $apartment->address }}
                                </p>
                                {{-- visibilità --}}
                                @if ($apartment->visible)
                                    <div class="d-flex align-items-center gap-2 ms-2">
                                        Visibile <span class="fa-solid fa-eye"></span>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center gap-2 ms-2">
                                        Non visibile <span class="fa-solid fa-eye-slash"></span>
                                    </div>
                                @endif
                                {{-- sponsor si o no --}}
                                @if ($apartment->sponsorships->isNotEmpty())
                                    <div class="d-flex align-items-center gap-2 ms-2">
                                        Sponsorizzato <span class="fas fa-award"></span>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center gap-2 ms-2">
                                        Non sponsorizzato
                                    </div>
                                @endif
                            </div>
                        </a>
                        {{-- sponsorizza / prolunga sponsorizzazione  --}}
                        @if ($apartment->sponsorships->isEmpty())
                            <div class="mt-auto d-flex justify-content-center p-2 ms-2">
                                <a href="{{ route('admin.sponsorships.index', ['apartment_id' => $apartment->id]) }}" class="btn my_btn">Sponsorizza</a>
                            </div>
                        @else
                            <div class="mt-auto d-flex justify-content-center p-2 ms-2">
                                <a href="{{ route('admin.sponsorships.index', ['apartment_id' => $apartment->id]) }}" class="btn my_btn">Prolunga la tua sponsorizzazione</a>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
