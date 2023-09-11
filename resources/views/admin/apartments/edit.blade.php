@extends('layouts.admin')

@section('content')
    {{-- Validazione errori --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {{-- loop errori --}}
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        <div>
    @endif

    <div class="container-form bg-light">
        <form action="{{ route('admin.apartments.update', ['apartment' => $apartment->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h2 class="mb-3 text-center">Modifica Appartamento</h2>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        {{-- input per titolo --}}
                        <label for="title">Titolo</label>
                        <input class="form-control mb-2" type="text" id="title" name="title" value="{{ old('title', $apartment->title) }}"
                            required>
                        @error('title')
                            <div class="bg-danger-subtle rounded">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                         {{-- input per indirizzo --}}
                        <label for="address">Indirizzo</label>
                        <input class="form-control mb-2" id="address" type="text" name="address"
                            value="{{ old('address', $apartment->address) }}" required>
                        @error('address')
                            <div class="bg-danger-subtle rounded">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                       {{-- input citta --}}
                        <label for="city">Città</label>
                        <input class="form-control mb-2" id="city" type="text" name="city"
                            value="{{ old('city', $apartment->city) }}" required>
                        @error('city')
                            <div class="bg-danger-subtle rounded">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        {{-- input per paese --}}
                        <label for="country">Paese</label>
                        <input class="form-control mb-2" id="country" type="text" name="country"
                            value="{{ old('country', $apartment->country) }}" required>
                        @error('country')
                            <div class="bg-danger-subtle rounded">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6">
                        {{-- input per stanze --}}
                        <label for="num_rooms" class="form-label">Stanze</label>
                        <select class="form-select mb-2" id="num_rooms" name="num_rooms">
                            <option value="{{ $apartment->num_rooms }}" selected>{{ $apartment->num_rooms }}</option>
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
                        <select class="form-select mb-2" id="num_bathrooms" name="num_bathrooms">
                            <option value="{{ $apartment->num_bathrooms }}" selected>{{ $apartment->num_bathrooms }}</option>
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
                        <input type='number' class="form-control mb-2" id="square_meters" name="square_meters" min="10" max="400"
                            value="{{ old('square_meters', $apartment->square_meters) }}">

                        @error('square_meters')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6">
                        {{-- input per prezzo --}}
                        <label for="price">Prezzo per notte</label>
                        <input class="form-control mb-2" type="text" id="price" name="price"
                            value="{{ old('price', $apartment->price) }}" required>
                        @error('price')
                            <div class="bg-danger-subtle rounded">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6">
                        {{-- input per decrizione --}}
                        <label for="description">Descrizione</label>
                        <textarea name="description" id="description" name="description" cols="30" rows="15" required class="form-control mb-2">{{ old('description', $apartment->description) }}</textarea>
                        @error('description')
                            <div class="bg-danger-subtle rounded">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 col-lg-6 d-flex flex-column">
                        {{-- input per immagine --}}
                        <label for="principal_image">Carica Immagine</label>
                        <div class="d-flex align-items-center mb-2">
                            @if ($apartment->principal_image)
                                <img id="preview" src="{{ asset('/storage') . '/' . $apartment->principal_image }}"
                                    alt="{{ $apartment->name }}" width="50" height="50" class="object-fit-cover rounded">
                            @else
                                <img id="preview" src="{{ asset('/storage') . '/placeholder/placeholder-img.png' }}" alt="img"
                                    width="50" height="50" class="object-fit-cover rounded">
                            @endif
                            <input type="file" name="principal_image" id="principal_image"
                                value="{{ old('principal_image', $apartment->principal_image) }}"
                                class="form-control @error('principal_image') is-invalid @enderror">
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
                                <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="serviceID[]"
                                    id="services{{ $i }}" @checked(in_array($service->id, old('services') ?? $apartment->services->pluck('id')->toArray()))>
                                <label for="services{{ $i }}" class="form-check-label me-2 service">{{ $service->name_service }}</label>
                            </div>
                            @endforeach
                            @error('services')
                                <div class="bg-danger-subtle rounded">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center mt-4">
                        {{-- input per visibilità --}}
                        <label for="visible" class="me-2">Visibilità</label>
                        <select name="visible" id="visible" class="mb-2">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                        {{-- crea --}}
                        <button class="btn my_btn my-2" type="submit" value="Modifica">Modifica</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputFile = document.getElementById('principal_image');
            const imagePreview = document.getElementById('imagePreview');
    
            // aggiorna l'anteprima dell'immagine
            function updateImagePreview(file) {
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
            }
    
            // Aggiorna l'anteprima dell'immagine quando viene selezionato un nuovo file
            inputFile.addEventListener('change', function () {
                const file = this.files[0];
                updateImagePreview(file);
            });
    
            // Imposta l'URL dell'immagine esistente nell'anteprima se presente
            const imageUrl = '{{ $apartment->principal_image ? asset("/storage") . "/" . $apartment->principal_image : "" }}';
            
            if (imageUrl) {
                const image = new Image();
                image.src = imageUrl;
                imagePreview.innerHTML = '';
                imagePreview.appendChild(image);
            } else {
                imagePreview.innerHTML = 'Nessuna immagine selezionata';
            }
    
            // conferma eliminazione
            const deleteButton = document.getElementById('deleteButton');
            const deleteForm = document.getElementById('deleteForm');
    
            deleteButton.addEventListener('click', function() {
                const confirmDelete = confirm("Sei sicuro di voler eliminare l'elemento selezionato?");
    
                if (confirmDelete) {
                    deleteForm.submit();
                } else {
                    console.log("Cancellazione annullata.");
                }
            });
        });
    </script>
    
    
    
@endsection
