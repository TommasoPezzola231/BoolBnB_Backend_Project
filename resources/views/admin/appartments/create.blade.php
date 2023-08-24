@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.appartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2>Aggiungi Appartamento</h2>

        {{-- input per titolo --}}
        <label for="title">Titolo</label>
        @error('title')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror
        <input class="form-control" type="text" name="title" value="{{ old('title') }}" required>

        {{-- input per immagine --}}
        <label for="image">Immagine</label>
        @error('principal_image')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror
        <input class="form-control" type="text" name="title" value="{{ old('principal_image') }}" required>


        {{-- input per decrizione --}}
        <label for="description">Descrizione</label>
        @error('description')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror
        <input class="form-control" type="text" name="description" value="{{ old('description') }}" required>


        {{-- input per prezzo --}}
        <label for="price">Prezzo</label>
        @error('price')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror
        <input class="form-control" type="text" name="price" value="{{ old('price') }}" required>


        {{-- input per paese --}}
        <label for="country">Paese</label>
        @error('country')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror
        <input class="form-control" type="text" name="country" value="{{ old('country') }}" required>


        {{-- input per stanze --}}
        <label for="num_room" class="form-label">Stanze</label>
        <select class="form-select" id="type_id" name="type_id">
            <option selected disabled>Select a type</option>
            @for ($i = 1; $i <= 15; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        @error('num_room')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>


        {{-- input per bagni --}}
        <label for="num_bathroom" class="form-label">Bagno</label>
        <select class="form-select" id="type_id" name="type_id">
            <option selected disabled>Select a type</option>
            @for ($i = 1; $i <= 7; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        @error('num_bathroom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>


        {{-- input per metri quadrati --}}
        <label for="square_meters" class="form-label">Metri Quadrati</label>
        <input type='number' class="form-select" id="square_meters" name="square_meters" min="10" max="400">
        @error('square_meters')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </div>

        {{-- input per indirizzo --}}

        <label for="address">Indirizzo</label>
        @error('address')
            <div class="bg-danger-subtle rounded">{{ $message }}</div>
        @enderror
        <input class="form-control" type="text" name="address" value="{{ old('address') }}" required>


        {{-- input per visibilità --}}
        <label for="visible">Visibilità</label>
        <select name="visible" id="visible">
            <option value="0">No</option>
            <option value="1">Si</option>
        </select>



        <input class="btn btn-primary my-2" type="submit" value="Crea">

    </form>
@endsection