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
    <div class="container-show container-show shadow p-4 my_media_small">
        <div class="row">
            <div class="col-12 col-md-6">
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
            <div class="col-12 col-md-6 mb-3">
                <div class="rounded-4 bg_img">
                    @if ($apartment->full_path_principal_image)
                        <img src="{{ $apartment->full_path_principal_image }}" alt="{{ $apartment->title }}" class="card-img-top rounded-4 shadow d-flex justify-content-center align-items-center">
                    @else
                        <img src="https://www.signfix.com.au/wp-content/uploads/2017/09/placeholder-600x400.png" class="card-img-top rounded-4 shadow" alt="Placeholder Image">
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <div id="map" class="w-100 ratio ratio-16x9 rounded-4"></div>
            </div>
            {{-- <div class="col-6">

            </div> --}}
            <div class="col-12 d-flex justify-content-md-end justify-content-center">
                <a href="{{ route('admin.apartments.edit', $apartment->id) }}"
                    class="btn btn-dark me-3">Modifica Elemento</a>
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

    {{-- modal --}}
    <div id="showModal" class="modal-overlay d-none shadow p-2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-itmes-center">
                    <span class="fa-solid fa-exclamation-circle text-danger"></span>
                    <h3 class="modal-title">Sei sicuro di voler cancellare l'appartamento?</h3>
                </div>
                <div class="modal-body">
                    <p class="text-danger">Una volta cancellato potrai recuperare il tuo appartamento nella sezione <strong class="text-dark">Archivio!</strong>.</p>
                </div>
                <div class="modal-footer d-flex justify-content-center  gap-3">
                    <button id="confirmButton" type="button" class="btn btn-danger">Conferma</button>
                    <button id="notDelete" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.getElementById('deleteButton');
            const deleteForm = document.getElementById('deleteForm');
            const confirmButton = document.getElementById('confirmButton');
            const notDelete = document.getElementById('notDelete');

            deleteButton.addEventListener('click', function() {
                const modal = document.getElementById('showModal');
                modal.classList.remove('d-none');
            });

            confirmButton.addEventListener('click', function() {
                deleteForm.submit();
            });

            notDelete.addEventListener('click', function() {
                const modal = document.getElementById('showModal');
                modal.classList.add('d-none');
            });

            const latitude = {{ $apartment->latitude }};
            const longitude = {{ $apartment->longitude }};
            let longLat = [{{ $apartment->longitude }}, {{ $apartment->latitude }}]

            const map = tt.map({
                key: 'U6BQ1DicdzYIkj5nrK4823OxJuCY6gyP',
                container: "map",
                center: longLat,
                zoom: 15
            });

            map.on('load', () => {
               new tt.Marker().setLngLat(longLat).addTo(map);
            })
        });
    </script>
@endsection
