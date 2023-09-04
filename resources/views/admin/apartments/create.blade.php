@extends('layouts.admin')

@section('content')
    {{-- Validazione errori --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {{-- loop errori--}}
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <div>
    @endif

    <div class="container-form">
        <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <h2 class="mb-3">Aggiungi Appartamento</h2>

            <div class="container">
                <div class="row">

                    <div class="col-12">
                        {{-- input per titolo --}}
                        <label for="title">Titolo</label>
                        <input class="form-control mb-2" type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="Inserisci il titolo">
                        @error('title')
                            <div class="bg-danger-subtle rounded">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        {{-- input per indirizzo --}}
                        <label for="address">Indirizzo</label>
                        <input class="form-control mb-2" id="address" type="text" name="address" list="addressSuggestions" value="{{ old('address') }}" onkeyup="fetchAndPopulateSuggestions()"  required placeholder="Inserisci indirizzo">
                
                        <datalist id="addressSuggestions">
                        </datalist>
                
                        @error('address')
                            <div class="bg-danger-subtle rounded">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        {{-- input citta --}}
                        <label for="city">Città</label>
                        <input class="form-control mb-2" id="city" type="text" name="city" value="{{ old('city') }}" required placeholder="Inserisci la città">
                        @error('city')
                            <div class="bg-danger-subtle rounded">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        {{-- input per paese --}}
                        <label for="country">Paese</label>
                        <input class="form-control mb-2" id="country" type="text" name="country" value="{{ old('country') }}" required placeholder="Inserisci il paese">
                        @error('country')
                            <div class="bg-danger-subtle rounded">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6">
                        {{-- input per stanze --}}
                        <label for="num_rooms" class="form-label">Stanze</label>
                        <select class="form-select mb-2" id="num_rooms" name="num_rooms">
                            <option selected disabled>Seleziona numero di stanze</option>
                            @for ($i = 1; $i <= 15; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('num_rooms')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6">
                        {{-- input per bagni --}}
                        <label for="num_bathrooms" class="form-label">Bagno</label>
                        <select class="form-control mb-2" id="num_bathrooms" name="num_bathrooms">
                            <option selected disabled value="">Seleziona numero di bagni</option>
                            @for ($i = 1; $i <= 7; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('num_bathrooms')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6">
                        {{-- input per metri quadrati --}}
                        <label for="square_meters" class="form-label">Metri Quadrati</label>
                        <input type='number' class="form-control mb-2" id="square_meters" name="square_meters" min="10" max="400" placeholder="Inserisci metri quadri">
                        @error('square_meters')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6">
                        {{-- input per prezzo --}}
                    <label for="price">Prezzo per notte</label>
                    <input class="form-control mb-2" type="text" id="price" name="price" value="{{ old('price') }}" required placeholder="Inserisci il prezzo">
                    @error('price')
                        <div class="bg-danger-subtle rounded">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="col-md-12 col-lg-6">
                        {{-- input per decrizione --}}
                        <label for="description">Descrizione</label>
                        <textarea name="description" id="description" cols="30" rows="15" value="{{ old('description') }}" required placeholder="Inserisci la descrizione" class="form-control mb-2"></textarea>
                            
                        @error('description')
                            <div class="bg-danger-subtle rounded">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6 d-flex flex-column">
                        {{-- input per immagine --}}
                        <label for="principal_image">Carica Immagine</label>
                        <div class="d-flex align-items-center mb-2">
                            <input type="file" name="principal_image" id="principal_image" value="{{ old('principal_image') }}"
                                class="form-control mb-2 @error('principal_image') is-invalid @enderror">
                        </div>
                        @error('principal_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div id="imagePreview" class="d-flex justify-content-center align-items-center">
                            Anteprima
                        </div>
                        
                    </div>

                    <div class="col-12">
                        {{-- servizi --}}
                        <div class="mt-2 service-badge">Seleziona Servizi</div>
                        <div class="container-services d-flex flex-wrap p-3 form-control mb-4">
                            @foreach ($services as $i => $service)
                                <div class="form-check">
                                    <input class="form-check-input mb-2" type="checkbox" value="{{ $service->id }}" name="serviceID[]"
                                        id="services{{ $i }}">
                                    <label for="services{{ $i }}" class="form-check-label me-2 service">{{ $service->name_service }}</label>
                                </div>
                            @endforeach
                            @error('service')
                                <div class="bg-danger-subtle rounded">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center mt-4">
                        {{-- input per visibilità --}}
                        <label for="visible" class="me-2">Visibile:</label>
                        <select name="visible" id="visible">
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </div>

                    <div class="col-12 d-flex justify-content-center mt-4">
                        {{-- crea --}}
                        <button class="btn btn-lg btn-outline-light my-2 primary-color-button" type="submit" value="Modifica">Crea</button>
                    </div>

                </div>
            </div>

        </form>
    </div>

    <script>
        const apiKey = "{{ env('TOMTOM_API_KEY') }}";
        const searchURL = 'https://api.tomtom.com/search/2/search/';

        const addressInput = document.getElementById('address');
        const cityInput = document.getElementById('city');
        const countryInput = document.getElementById('country');

        addressInput.addEventListener('input', async () => {
            const query = addressInput.value;

            if (query.length >= 2) {
                const response = await fetch(`${searchURL}${query}.json?key=${apiKey}`);
                const suggestions = await response.json();

                if (suggestions.results && suggestions.results.length > 0) {
                    const firstResult = suggestions.results[0];

                    cityInput.value = firstResult.address.municipality || '';
                    countryInput.value = firstResult.address.country || '';
                    inputLat.value = firstResult.position.lat || '';
                    inputLon.value = firstResult.position.lon || '';
                }
            }
        });
        
        function fetchAndPopulateSuggestions() {
            
        var input = document.getElementById('address').value.toLowerCase();
        var inputWithHyphens = input.replace(/ /g, '-');
        var datalist = document.getElementById('addressSuggestions');
        datalist.innerHTML = ''; // Pulisci le opzioni suggerite precedenti

        var apiUrl = 'https://api.tomtom.com/search/2/geocode/';
        var fullUrl = `${apiUrl}${input}.json?key=${apiKey}`;
        
        // Effettua la chiamata AJAX per ottenere i suggerimenti dall'API
        fetch(fullUrl)
            .then(response => response.json())
            .then(data => {
                data.results.forEach(element => {
                    var prova = element.address.freeformAddress;
                    console.log(prova)
                    var option = document.createElement('option');
                    option.value = prova;
                    datalist.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Errore durante il recupero dei suggerimenti:', error);
            });
    };

    // preview immagine
        const inputFile = document.getElementById('principal_image');
        const imagePreview = document.getElementById('imagePreview');

        inputFile.addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const image = new Image();
                    image.src = e.target.result;
                    imagePreview.innerHTML = '';
                    imagePreview.appendChild(image);
                };

                reader.readAsDataURL(file);
            } else {
                imagePreview.innerHTML = 'Nessuna immagine selezionata';
            }
        });
    </script>

@endsection

