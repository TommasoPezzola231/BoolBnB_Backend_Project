@extends('layouts.admin')

@section('content')

    <section>
        <div class="row">
            <h2 class="my-3 text-center">I tuoi appartamenti</h2>
            @foreach ($apartments as $apartment)
                <a class="col-3" href="{{ route("admin.apartments.show", $apartment->id) }}">
                    <div class="card col-4 m-2" style="width: 18rem;">
                        @if ($apartment->full_path_principal_image)
                            <img src="{{ $apartment->full_path_principal_image }}" class="card-img-top" alt="{{ $apartment->title }}">
                        @else
                            <img src="https://www.signfix.com.au/wp-content/uploads/2017/09/placeholder-600x400.png" class="card-img-top" alt="Placeholder Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $apartment->title }}</h5>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </section>

@endsection
