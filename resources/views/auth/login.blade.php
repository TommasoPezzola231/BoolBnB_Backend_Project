@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
    {{-- <div class="row"> --}}
        {{-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('login') }}" onsubmit="login(event)">
                        @csrf

                        <div class='mb-4 row'>
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input  placeholder="Inserisci l'indirizzo email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Inserisci la password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4 d-flex gap-5 align-content-center align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-8 offset-md-4">

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Password dimenticata?') }}
                                </a>

                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('Registrati') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}


    {{-- <div class="container h-100">
        <div class="row h-100">
            <div class="col">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0"> --}}
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{ asset('images/form-img-ragazza-login.webp') }}"
                            alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;"/>
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form id="form" method="POST" action="{{ route('login') }}" onsubmit="login(event)">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="{{ asset('images/logo/Bool_Bnb_Black.png') }}" alt="Logo" style="max-width: 100px;">
                                        <h3 class="m-0">BoolBnB</h3>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Effettua il Login</h5>

                                    {{-- email --}}
                                    <div class="form-outline mb-4">
                                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <label for="email" class="form-label">{{ __('email') }}</label>
                                    </div>

                                    {{-- password --}}
                                    <div class="form-outline mb-4">
                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <label for="password" class="form-label">{{ __('Password') }}</label>
                                    </div>

                                    {{-- button  --}}
                                    <div class="pt-1 mb-4">
                                        <div class="form-check pb-4">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Ricordami') }}
                                            </label>
                                        </div>

                                        <button class="btn btn-dark btn-lg btn-block" type="submit">{{ __('Login') }}</button>
                                    </div>

                                    <a class="small text-muted" href="{{ route('password.request') }}">
                                        {{ __('Password dimenticata?') }}
                                    </a>
                                    <p class="mb-5 pb-lg-2">Non hai un account?
                                        <a href="{{ route('register') }}" style="color: #393f81;">
                                            Registrati
                                        </a>
                                    </p>
                                    <a href="#!" class="small text-muted">Terms of use.</a>
                                    <a href="#!" class="small text-muted">Privacy policy</a>
                                </form>
                            </div>
                        </div>
                    {{-- </div>
                </div>
            </div>
        </div> --}}
    </div>

    {{-- </div>
</div> --}}

<script>
    function login(ev) {
        ev.preventDefault();

        const formData = new FormData(ev.target);

        axios.post('/login', formData)
            .then(function(response) {
                // Redirect to the desired page after successful login
                window.location.href = '{{ route('admin.dashboard') }}';
            })
                .catch(function(error) {
                    // Handle error
                    const errors = error.response.data.errors;

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
                                this.nextElementSibling.remove();



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
