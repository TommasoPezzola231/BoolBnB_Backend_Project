@extends('layouts.admin')

@section('content')
    

        <div class="container-fluid">

            
            <div class="row">
                <div class="col-4 p-0">
                    <h3 class="mt-3">Filtra per appartamento</h3>
                    @foreach ($apartments as $apartment)
                    <div class="border p-4 apartment-item" data-apartment-id="{{$apartment->id}}">
                        {{$apartment->title}}
                    </div>
                    @endforeach
                </div>
                <div class="col-8 m-auto latosx">
                    

                    <div>

                        @foreach ($messages as $message)
                        <div class="message-item p-4 border" data-apartment-id="{{$message->apartment_id}}">
                            <div class="d-flex justify-content-between">
                                <h5>{{ $message->name_sender }} {{ $message->surname_sender}}</h5>
                                 
                                @if (\Carbon\Carbon::hasFormat($message->sent_at, 'Y-m-d H:i:s'))       
                                    <div>{{ \Carbon\Carbon::parse($message->sent_at)->format('m/d/Y') }}</div>
                                @else
                                    <div class="text-secondary">{{ $message->sent_at }}</div>
                                @endif
                            </div>
                            <div id="{{$message->id}}">
                                <div class="badge bg-primary mb-3"> {{ $message->apartment_title }}</div>
                                <p>Email: {{ $message->email_sender }}</p>
                                <p>Oggetto: {{ $message->message_object}}</p>
                                <p>Messaggio: {{ $message->message_text }}</p>
                                <a class="button btn-primary" href="mailto:{{$message->email_sender}}">Rispondi via email</a>

                            </div> 
                        </div>

                        @endforeach
               
                    </div>

                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const apartmentItems = document.querySelectorAll('.apartment-item');
                const messageItems = document.querySelectorAll('.message-item');
        
                apartmentItems.forEach(function(apartmentItem) {
                    apartmentItem.addEventListener('click', function() {
                        const apartmentId = this.getAttribute('data-apartment-id');
        
                        messageItems.forEach(function(messageItem) {
                            messageItem.style.display = 'none';
                        });
        
                        const messagesForApartment = document.querySelectorAll('.message-item[data-apartment-id="' + apartmentId + '"]');
                        messagesForApartment.forEach(function(messageItem) {
                            messageItem.style.display = 'block';
                        });
        
                        apartmentItems.forEach(function(item) {
                            item.classList.remove('selected');
                        });
                        this.classList.add('selected');
                    });
                });
            });
        </script>
        
        
        


        {{-- <h1 class="spingiGiu">Messaggi ricevuti</h1>

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

        
        <ul>
            @foreach ($messages as $message)
                <li>
                    <h3>{{ $message->name_sender }} {{ $message->surname_sender}}</h3>
                    
                    @if (\Carbon\Carbon::hasFormat($message->sent_at, 'Y-m-d H:i:s'))
                        
                        <p>{{ \Carbon\Carbon::parse($message->sent_at)->format('m/d/Y') }}</p>
                    @else
                       
                        <p>Ricevuto il: {{ $message->sent_at }}</p>
                    @endif
                    <p>Email cliente: {{ $message->email_sender }}</p>
                    <p>Oggetto: {{ $message->message_object}}</p>
                    <p>Messaggio: {{ $message->message_text }}</p>
                </li>
            @endforeach
        </ul> --}}


       

        
    
@endsection


