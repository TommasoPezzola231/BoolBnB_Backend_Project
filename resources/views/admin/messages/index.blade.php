@extends('layouts.admin')

@section('content')
    

        <div class="container">
            <div class="row">
                <div class="col-4 latosx">
                    <h3 class="mt-4 ms-4">Tutti i messaggi</h3>
                    <form action="{{ route('admin.messages.index') }}" method="get" class="ms-4 mt-2">
                        <label for="apartment_id">Filter by Apartment:</label>
                        <select name="apartment_id" id="apartment_id">
                            <option value="">All Apartments</option>
                            @foreach ($apartments as $apartment)
                                <option value="{{ $apartment->id }}" {{ $apartment_id == $apartment->id ? 'selected' : '' }}>
                                    {{ $apartment->title }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit">Filter</button>
                    </form>
                    
                    @foreach ($messages as $message)
                    <div class="border p-3">
                        <div class="d-flex justify-content-between">
                            <h5>{{ $message->name_sender }} {{ $message->surname_sender}}</h5>
                            {{-- Check if sent_at is a valid date --}}
                            @if (\Carbon\Carbon::hasFormat($message->sent_at, 'Y-m-d H:i:s'))
                                {{-- Format sent_at as desired --}}
                                <div>{{ \Carbon\Carbon::parse($message->sent_at)->format('m/d/Y') }}</div>
                            @else
                                {{-- Handle the case when sent_at is not a valid date --}}
                                <div>{{ $message->sent_at }}</div>
                            @endif
                        </div>
                        <p>{{ $apartment->title }}</p>
                        <p>{{ $message->message_object}}</p>
                            
                
                    </div>  
                    @endforeach
                    
                        
                    
                </div>
                <div class="col-8 latodx"></div>
            </div>
        </div>






























        
        <h1 class="spingiGiu">Messaggi ricevuti</h1>

        <form action="{{ route('admin.messages.index') }}" method="get">
            <label for="apartment_id">Filter by Apartment:</label>
            <select name="apartment_id" id="apartment_id">
                <option value="">All Apartments</option>
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
    
@endsection


