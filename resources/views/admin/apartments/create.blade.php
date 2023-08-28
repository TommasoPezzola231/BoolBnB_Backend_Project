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

    <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2>Aggiungi Appartamento</h2>

        {{-- input per titolo --}}
        <label for="title">Titolo</label>
        <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" required>
        @error('title')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror

        {{-- input per immagine --}}
        <label for="principal_image">Carica Immagine</label>
        <div class="d-flex align-items-center p-2 mb-4 gap-2">
            {{-- <img id="previewCreate" src="{{ asset('/storage') . '/placeholder/placeholder-img.png' }}" alt="img"
                width="50" height="50" class="object-fit-cover rounded"> --}}
            <input type="file" name="principal_image" id="principal_image" value="{{ old('principal_image') }}"
                class="form-control @error('principal_image') is-invalid @enderror">
        </div>
        @error('principal_image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- input per decrizione --}}
        <label for="description">Descrizione</label>
        <input class="form-control" type="text" id="description" name="description" value="{{ old('description') }}"required>
        @error('description')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror

        {{-- input per prezzo --}}
        <label for="price">Prezzo</label>
        <input class="form-control" type="text" id="price" name="price" value="{{ old('price') }}" required>
        @error('price')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror

        {{-- input per paese --}}
        <label for="country">Paese</label>
        <input class="form-control" id="country" type="text" name="country" value="{{ old('country') }}" required>
        @error('country')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror

        {{-- input citta --}}
        <label for="city">Città</label>
        <input class="form-control" id="city" type="text" name="city" value="{{ old('city') }}" required>
        @error('city')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror

        {{-- input per stanze --}}
        <label for="num_rooms" class="form-label">Stanze</label>
        <select class="form-select" id="num_rooms" name="num_rooms">
            <option selected disabled>Select a type</option>
            @for ($i = 1; $i <= 15; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        @error('num_rooms')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- input per bagni --}}
        <label for="num_bathrooms" class="form-label">Bagno</label>
        <select class="form-control" id="num_bathrooms" name="num_bathrooms">
            <option selected disabled value="">Select a type</option>
            @for ($i = 1; $i <= 7; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        @error('num_bathrooms')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- input per metri quadrati --}}
        <label for="square_meters" class="form-label">Metri Quadrati</label>
        <input type='number' class="form-control" id="square_meters" name="square_meters" min="10" max="400">
        @error('square_meters')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- input per indirizzo --}}
        <label for="address">Indirizzo</label>
        <input class="form-control" id="address" type="text" name="address" list="addressSuggestions" value="{{ old('address') }}" onkeyup="fetchAndPopulateSuggestions()"  required>


        <datalist id="addressSuggestions">
        </datalist>

        @error('address')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror

        {{-- servizi --}}
        <div class="mt-3">Seleziona Servizi</div>
        @foreach ($services as $i => $service)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="serviceID[]"
                    id="services{{ $i }}">
                <label for="services{{ $i }}" class="form-check-label">{{ $service->name_service }}</label>
            </div>
        @endforeach
        @error('service')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror

        {{-- input per visibilità --}}
        <label for="visible">Visibilità</label>
        <select name="visible" id="visible">
            <option value="0">No</option>
            <option value="1">Si</option>
        </select>

        {{-- crea --}}
        <button class="btn btn-success my-2" type="submit" value="Modifica">Crea</button>
    </form>


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


        //////////////

        
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
    }
    </script>

@endsection

