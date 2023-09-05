@extends('layouts.admin')

@section('content')

    <section>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2 class="my-3">Appartamenti eliminati</h2>
                    <hr>
                    <table class="table table-bordered mt-3">
                        <thead>
                          <tr class="table-secondary">
                            <th scope="col">Titolo</th>
                            <th scope="col">Indirizzo</th>
                            <th scope="col">Città</th>
                            <th scope="col">Azioni</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($deletedApartments as $deletedApartment)
                                <tr class="table-danger">
                                    <td>{{$deletedApartment->title}}</td>
                                    <td>{{$deletedApartment->address}}</td>
                                    <td>{{$deletedApartment->city}}</td>
                                    <td>
                                        <a href="{{route('admin.apartments.restore', $deletedApartment->id)}}" class="btn btn-success">Ripristina</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>

    </section>

@endsection
