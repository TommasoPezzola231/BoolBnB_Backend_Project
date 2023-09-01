@extends('layouts.admin')

@section('content')

    <section>
        <h1>Sponsorizza il tuoi appartamenti, per esseri primo nei risultati degli utenti</h1>
    </section>

    <section>
        <h2>Lista Sponsorizzazioni</h2>
        <ul>
            @foreach ($sponsorships as $sponsorship)
                <li>
                    <h3>{{ $sponsorship->name_sponsorship }}</h3>
                    <p>{{ $sponsorship->price }} €</p>
                    <p>{{ $sponsorship->duration }} ore</p>
                </li>
            @endforeach
        </ul>
    </section>

@endsection
