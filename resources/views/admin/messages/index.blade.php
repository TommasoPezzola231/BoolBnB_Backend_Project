@extends('layouts.admin')

@section('content')
    

        <div class="container-fluid" id="container-messages">

            
            <div class="row">
                <div class="col-4 d p-0 bg-light latosx">
                    <div class="form-control p-0">
                        <h3 class="mt-3 ms-3">Filtra per appartamento</h3>
                        @foreach ($apartments as $apartment)
                            <div class="p-3 apartment-item" data-apartment-id="{{$apartment->id}}">
                            {{$apartment->title}}
                            </div>
                        @endforeach
                    </div>
                    
                </div>

                <div class="col-8 m-auto latodx">
                    <div>

                        @foreach ($messages as $message)
                        <div class="message-item border rounded-4 mb-4 my-4 p-4" data-apartment-id="{{$message->apartment_id}}">
                            <div class="d-flex justify-content-between">
                                <h5>{{ $message->name_sender }} {{ $message->surname_sender}}</h5>
                                 
                                @if (\Carbon\Carbon::hasFormat($message->sent_at, 'Y-m-d H:i:s'))       
                                    <div>{{ \Carbon\Carbon::parse($message->sent_at)->format('m/d/Y') }}</div>
                                @else
                                    <div class="text-secondary">{{ $message->sent_at }}</div>
                                @endif
                            </div>
                            <div id="{{$message->id}}">
                                <a href="{{ route("admin.apartments.show", $message->apartment_id) }}" class="badge bg-primary mb-3">{{ $message->apartment_title }}</a>
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
        
    
@endsection


