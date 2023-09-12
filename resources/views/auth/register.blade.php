@extends('layouts.app')

@section('content')

    {{-- form --}}
    <div class="col d-flex align-items-center">
        <div class="card-body p-lg-5 text-black">

            <form id="form" method="POST" action="{{ route('register') }}" onsubmit="register(event)">
                @csrf

                <div class="d-flex align-items-center mb-3 pb-1">
                    <img src="{{ asset('images/logo/Bool_Bnb_Black.png') }}" alt="Logo" style="max-width: 100px;">
                    <h3 class="m-0">BoolBnB</h3>
                </div>

                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Effettua la registrazione</h5>

                {{-- <div class="col col-md-6"> --}}
                <div class="row">
                    {{-- name --}}
                    <div class="col-12 col-md-6">
                        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="name" class="form-label">{{ __('Nome') }}</label>
                    </div>

                    {{-- surname --}}
                     <div class="col-12 col-md-6">
                        <input id="surname" type="text" class="form-control form-control-lg @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="name" class="form-label">{{ __('Cognome') }}</label>
                    </div>

                    {{-- birth_date --}}
                    <div class="col-12 col-md-6">
                        <input id="birth_date" type="date" class="form-control form-control-lg @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date" autofocus>

                        @error('birth_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="name" class="form-label">{{ __('Data di nascita') }}</label>
                    </div>

                    {{-- email --}}
                    <div class="col-12 col-md-6">
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="email" class=" d-block form-label">{{ __('email') }}</label>
                    </div>

                    {{-- password --}}
                    <div class="col-12 col-md-6">
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="password" class="form-label">{{ __('Password') }}</label>
                    </div>

                    {{-- password-confirm --}}
                    <div class="col-12 col-md-6">
                        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">

                        <label for="password-confirm" class="form-label">{{ __('Conferma la password') }}</label>
                    </div>

                    {{-- submit --}}
                    <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">{{ __('Registrati') }}</button>
                    </div>

                    <p class="mb-5 pb-lg-2">Sei già registrato?
                        <a href="{{ route('login') }}" style="color: #393f81;">
                            Accedi
                        </a>
                    </p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                </div>
            </form>
        </div>
    </div>

    {{-- axios --}}
    <script>
        function register(ev) {

           ev.preventDefault();

           const formData = new FormData(ev.target);

            axios.post('/register', formData)
              .then(function(response) {
              // redirect alla dashboard utente
              window.location.href = '{{ route('admin.dashboard') }}';
            })

            .catch(function(error) {
                // errori di validazione
                const errors = error.response.data.errors;
                // loop errori e le stampa
                for (const fieldName in errors) {
                    const inputElement = document.querySelector(`[name="${fieldName}"]`);
                    const errorMessages = errors[fieldName].join(', ');
                    if (!inputElement.classList.contains('is-invalid')) {
                        inputElement.classList.add('is-invalid');
                        inputElement.insertAdjacentHTML('afterend', `<div class="invalid-feedback">${errorMessages}</div>`);
                    } else {
                        const invalidFeedback = inputElement.nextElementSibling;
                        invalidFeedback.innerHTML = errorMessages;
                    }
                }
                // rimuove is anvalid
                const inputElements = document.querySelectorAll('.is-invalid');
                inputElements.forEach(function(inputElement) {
                    inputElement.addEventListener('input', function() {
                        this.classList.remove('is-invalid');
                        // this.nextElementSibling.remove();
                    });
                });
                // se non ci sono piu errori manda i dati al server + redirect
                const errorMessages = document.querySelectorAll('.invalid-feedback');
                if (errorMessages.length === 0) {
                    const form = document.getElementById('form');
                    form.submit();
                    window.location.href = '{{ route('admin.dashboard') }}';
                }
            });
        }
    </script>
@endsection
