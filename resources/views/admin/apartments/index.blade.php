@extends('layouts.admin')

@section('content')
    <section>
        <div class="row">
            <h2 class="my-3">I tuoi appartamenti</h2>
            <hr>
        </div>
        <div class="row mx-auto d-flex flex-wrap">
            @foreach ($apartments as $apartment)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card-apartment shadow p-1 rounded-4 m-3">
                        <a href="{{ route("admin.apartments.show", $apartment->id) }}">
                            <div class="m-2 ">
                                @if ($apartment->full_path_principal_image)
                                    <img src="{{ $apartment->full_path_principal_image }}" class="rounded-4" alt="{{ $apartment->title }}">
                                @else
                                    <img src="https://www.signfix.com.au/wp-content/uploads/2017/09/placeholder-600x400.png" class="rounded-4" alt="Placeholder Image">
                                @endif
                                <div class="title m-2 w-100">
                                    {{ $apartment->title }}
                                </div>
                                <p class="ms-2 fw-light text-secondary">
                                    {{ $apartment->address }}, {{$apartment->city}}
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
