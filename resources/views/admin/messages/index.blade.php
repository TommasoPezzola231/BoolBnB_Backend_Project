@extends('layouts.admin')

@section('content')

    <section>
        <h1>Messaggi ricevuti</h1>

        <form action="{{ route('admin.messages.index') }}" method="get">
            <label for="apartment_id">Filter by Apartment:</label>
            <select name="apartment_id" id="apartment_id">
                <option value="">All Apartments</option>
                @foreach ($apartments as $apartment)
                    <option value="{{ $apartment->id }}">{{ $apartment->name }}</option>
                @endforeach
            </select>
            <button type="submit">Filter</button>
        </form>

            {{-- show all messages received from user --}}

            <ul>
                @foreach ($messages as $message)
                    <li>
                        <h3>{{ $message->name_sender }}</h3>
                        {{-- transform the data in mm/dd/yyyy --}}
                        <p>{{ $message->sent_at }}</p>
                        <p>{{ $message->surname_sender }}</p>
                        <p>{{ $message->email_sender }}</p>
                        <p>{{ $message->message_text }}</p>
                    </li>
                @endforeach
            </ul>
    </section>

@endsection


