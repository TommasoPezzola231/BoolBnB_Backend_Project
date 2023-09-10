@extends('layouts.admin')

@section('content')

    @if ($messages->isEmpty())
        <section class="p-4">
            <div class="row">
                <h2 class="my-3 text-center bold">I Tuoi Messaggi</h2>
                <hr>
            </div>
            <div class="row mx-auto d-flex flex-wrap">
                <div class="col-12 text-center">
                    <h3 class="text-white">Non hai ricevuto nessun messaggio</h3>
                </div>
            </div>
        </section>

    @else

        <div class="container-fluid" id="container-messages">
            <div class="row">
                {{-- lato sinistro --}}
                <div class="col-12 col-lg-4 col-xl-3 col-xxl-2 d p-0 latosx">
                    <div class="mt-3 pt-3">
                        <h3 class="mt-3 ms-3 text-center">I Tuoi Appartamenti</h3>
                        <div class="col-12 mt-5">
                            @foreach ($apartments as $apartment)
                                <div class="col-12 p-3 apartment-item" data-apartment-id="{{$apartment->id}}">
                                {{$apartment->title}}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- lato destro --}}
                <div class="col-12 col-lg-8 col-xl-9 col-xxl-10 latodx">
                    <div class="col-12 col-md-8 mx-md-auto">
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
                                    <a href="{{ route("admin.apartments.show", $message->apartment_id) }}" class="badge my_color_badge mb-3">{{ $message->apartment_title }}</a>
                                    <p><strong>Email:</strong> {{ $message->email_sender }}</p>
                                    <p><strong>Oggetto:</strong> {{ $message->message_object}}</p>
                                    <p><strong>Messaggio:</strong> {{ $message->message_text }}</p>
                                    <a class="button my_color" href="mailto:{{$message->email_sender}}">Rispondi via email</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const apartmentItems = document.querySelectorAll('.apartment-item');
            const messageItems = document.querySelectorAll('.message-item');

            function showMessagesForApartment(apartmentId) {
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

                const selectedApartment = document.querySelector('.apartment-item[data-apartment-id="' + apartmentId + '"]');
                if (selectedApartment) {
                    selectedApartment.classList.add('selected');
                }
            }

            const firstApartment = apartmentItems[0];
            if (firstApartment) {
                const firstApartmentId = firstApartment.getAttribute('data-apartment-id');
                showMessagesForApartment(firstApartmentId);
            }

            apartmentItems.forEach(function(apartmentItem) {
                apartmentItem.addEventListener('click', function() {
                    const apartmentId = this.getAttribute('data-apartment-id');
                    showMessagesForApartment(apartmentId);
                });
            });
        });
    </script>
@endsection


