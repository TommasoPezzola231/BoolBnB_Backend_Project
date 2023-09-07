@extends('layouts.admin')

@section('content')

    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-white">Dettagli Appartamento</h2>
                <hr>
            </div>
        </div>
    </div>
    <div class="container container-show rounded-4 shadow p-4">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <h2 class="mb-3">
                        {{ $apartment->title }}
                    </h2>
                    <div class="mb-3"><i class="fa-solid fa-location-dot color-primary"></i> {{ $apartment->address }}, {{ $apartment->city }}, {{ $apartment->country }}</div>
                    <div class="mb-3"> {{ $apartment->description }} </div>
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <h3 class="color-primary">Caratteristiche</h3>
                            <ul>
                                <li>
                                    Prezzo: {{ $apartment->price }} €
                                </li>
                                <li>
                                    Stanze: {{ $apartment->num_rooms }}
                                </li>
                                <li>
                                    Bagni: {{ $apartment->num_bathrooms }}
                                </li>
                                <li>
                                    Metri quadri: {{ $apartment->square_meters }} mq
                                </li>
                                <li>
                                    @if ($apartment->visible)
                                        Visibile <i class="fa-solid fa-eye"></i>
                                    @else
                                        Non visibile <i class="fa-solid fa-eye-slash"></i>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-12">
                            <h3 class="color-primary">Servizi</h3>
                            <ul>
                                @foreach ($apartment->services as $service)
                                    <li>{{ $service->name_service }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h3 class="color-primary">Sponsorizzazione</h3>
                                <ul>
                                    @if ($apartment->sponsorships->isNotEmpty())
                                        {{-- @foreach ($apartment->sponsorships as $sponsorship)
                                            <li>
                                                <strong>Sponsorizzazione attiva:</strong>
                                                {{ $sponsorship->name_sponsorship }}
                                            </li>
                                            <li>
                                                <strong>Scadenza:</strong>
                                                {{ $sponsorship->pivot->end_time }}
                                            </li>
                                        @endforeach --}}
                                        <li>
                                            <strong>Sponsorizzazione attiva:</strong>
                                            {{ $apartment->sponsorships->last()->name_sponsorship }}
                                        </li>
                                        <li>
                                            <strong>Scadenza:</strong>
                                            {{ $apartment->sponsorships->last()->pivot->end_time }}
                                        </li>
                                    @else
                                        <li>
                                            <strong>Nessuna sponsorizzazione attiva</strong>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div id="map" class="w-100 ratio ratio-16x9 rounded-4"></div>
            </div>
            <div class="col-6 d-flex align-items-center mt-3">
                <div class="image-container mb-3 rounded-4">
                    @if ($apartment->full_path_principal_image)
                        <img src="{{ $apartment->full_path_principal_image }}" alt="{{ $apartment->title }}" class="rounded-4 shadow">
                    @else
                        <img src="https://www.signfix.com.au/wp-content/uploads/2017/09/placeholder-600x400.png" class="card-img-top" alt="Placeholder Image">
                    @endif
                </div>
            </div>
            <div class="col-6">
               
            </div>
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('admin.apartments.edit', $apartment->id) }}"
                    class="btn btn-primary me-3">Modifica Elemento</a>
                {{-- form per la cancellazione + pop up --}}
                <form id="deleteForm" action="{{ route('admin.apartments.destroy', $apartment) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')

                    <button id="deleteButton" class="btn btn-danger" type="button">Cancella Elemento</button>
                </form>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.getElementById('deleteButton');
            const deleteForm = document.getElementById('deleteForm');

            deleteButton.addEventListener('click', function() {
                // Mostra un popup di conferma
                const confirmDelete = confirm("Sei sicuro di voler eliminare l'elemento selezionato?");

                if (confirmDelete) {
                    // Invia il modulo per la cancellazione
                    deleteForm.submit();
                } else {
                    console.log("Cancellazione annullata.");
                }
            });

            const latitude = {{ $apartment->latitude }};
            const longitude = {{ $apartment->longitude }};
            let longLat = [{{ $apartment->longitude }}, {{ $apartment->latitude }}]
            // Inizializza la mappa
            const map = tt.map({
                key: 'U6BQ1DicdzYIkj5nrK4823OxJuCY6gyP',
                container: "map",
                center: longLat,
                zoom: 15
            });

            map.on('load', () => {
               new tt.Marker().setLngLat(longLat).addTo(map);
            })
            // Aggiungi un marker per le coordinate
        });
    </script>
@endsection
