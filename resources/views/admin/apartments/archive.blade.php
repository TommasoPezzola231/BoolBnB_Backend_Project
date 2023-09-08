@extends('layouts.admin')

@section('content')

    {{-- <section class="p-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="my-3 text-center text-white">Appartamenti eliminati</h2>
                    <hr>
                    @if ($deletedApartments->isEmpty())
                        <div class="col-12 text-center">
                            <h3 class="text-white">Non hai nessun appartamento archiviato</h3>
                        </div>
                    @else
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr class="table">
                                    <th scope="col">Titolo</th>
                                    <th scope="col">Indirizzo</th>
                                    <th scope="col">Città</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deletedApartments as $deletedApartment)
                                    <tr class="table-warning">
                                        <td>{{$deletedApartment->title}}</td>
                                        <td>{{$deletedApartment->address}}</td>
                                        <td>{{$deletedApartment->city}}</td>
                                        <td>
                                            <a href="{{route('admin.apartments.restore', $deletedApartment->id)}}" class="btn btn-success">Recupera</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section> --}}

    <section class="p-md-5 m-xl-5">
        <div class="container-fluid p-1">
            <div class="row">
                <div class="col-12">
                    <h2 class="my-3 text-center text-white">Appartamenti eliminati</h2>
                    <hr>
                    @if ($deletedApartments->isEmpty())
                        <div class="col-12 text-center">
                            <h3 class="text-white">Non hai nessun appartamento archiviato</h3>
                        </div>
                    @else
                        <div class="table-responsive overflow-hidden">
                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr class="table">
                                        <th scope="col">Titolo</th>
                                        <th scope="col">Indirizzo</th>
                                        <th scope="col">Città</th>
                                        <th scope="col">Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deletedApartments as $deletedApartment)
                                        <tr class="table-warning">
                                            <td>{{$deletedApartment->title}}</td>
                                            <td>{{$deletedApartment->address}}</td>
                                            <td>{{$deletedApartment->city}}</td>
                                            <td>
                                                <a href="{{route('admin.apartments.restore', $deletedApartment->id)}}" class="btn btn-success">Recupera</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
