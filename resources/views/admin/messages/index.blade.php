@extends('layouts.admin')

@section('content')
    <section>
        <h1>Messaggi ricevuti</h1>

        <form action="{{ route('admin.messages.index') }}" method="get">
            <label for="apartment_id">Filter by Apartment:</label>
            <select name="apartment_id" id="apartment_id">
                <option value="">Tutti i messaggi</option>
                @foreach ($apartments as $apartment)
                    <option value="{{ $apartment->id }}" {{ $apartment_id == $apartment->id ? 'selected' : '' }}>
                        {{ $apartment->title }}
                    </option>
                @endforeach
            </select>
            <button type="submit">Filter</button>
        </form>

        {{-- Show all messages received from user --}}
        <ul>
            @foreach ($messages as $message)
                <li>
                    <h3>{{ $message->name_sender }} {{ $message->surname_sender}}</h3>
                    {{-- Check if sent_at is a valid date --}}
                    @if (\Carbon\Carbon::hasFormat($message->sent_at, 'Y-m-d H:i:s'))
                        {{-- Format sent_at as desired --}}
                        <p>{{ \Carbon\Carbon::parse($message->sent_at)->format('m/d/Y') }}</p>
                    @else
                        {{-- Handle the case when sent_at is not a valid date --}}
                        <p>Ricevuto il: {{ $message->sent_at }}</p>
                    @endif
                    <p>Email cliente: {{ $message->email_sender }}</p>
                    <p>Oggetto: {{ $message->message_object}}</p>
                    <p>Messaggio: {{ $message->message_text }}</p>
                </li>
            @endforeach
        </ul>
    </section>
@endsection


