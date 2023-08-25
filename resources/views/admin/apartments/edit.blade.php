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

    <form action="{{ route('admin.apartments.update', ['apartment' => $apartment->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h2>Modifica Appartamento</h2>

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
        <select class="form-select" id="num_bathrooms" name="num_bathrooms">
            <option selected disabled>Select a type</option>
            @for ($i = 1; $i <= 7; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        @error('num_bathrooms')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- input per metri quadrati --}}
        <label for="square_meters" class="form-label">Metri Quadrati</label>
        <input type='number' class="form-select" id="square_meters" name="square_meters" min="10" max="400">
        @error('square_meters')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- input per indirizzo --}}
        <label for="address">Indirizzo</label>
        <input class="form-control" id="address" type="text" name="address" value="{{ old('address') }}" required>
        @error('address')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror

        {{-- servizi --}}
        @foreach ($services as $i => $service)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="serviceID[]"
                    id="services{{ $i }}">
                <label for="services{{ $i }}" class="form-check-label">{{ $service->name_service }}</label>
            </div>
        @endforeach
        @error('services')
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
@endsection
