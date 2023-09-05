@extends('layouts.admin')

@section('content')
    
    <section>
        <div class="row">
            <h2 class="my-3 text-center">Appartamenti eliminati</h2>
            @foreach ($deletedApartments as $deletedApartment)

                <div class="card col-4 m-2" style="width: 18rem;">
                    <img src="{{ ($deletedApartment['principal_image']) ? asset('storage/' . $deletedApartment->principal_image) : "https://www.signfix.com.au/wp-content/uploads/2017/09/placeholder-600x400.png" }}" class="card-img-top" alt="{{ $deletedApartment->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $deletedApartment->title }}</h5>
                    </div>
                    <form id="deleteForm" action="{{ route('admin.apartments.destroy', $deletedApartment) }}" method="POST">
                        @csrf
                        @method('DELETE')
                
                        <button id="deleteButton" class="btn btn-danger" type="submit">Cancella Elemento</button>
                    </form>
                </div>
                
            @endforeach

        </div>
    </section>

@endsection
