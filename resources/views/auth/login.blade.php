@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form id="form" method="POST" action="{{ route('login') }}" onsubmit="login(event)">
                        @csrf

                        <div class='mb-4 row'>
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Password dimenticata?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
                        inputElement.classList.add('is-invalid');
                        inputElement.insertAdjacentHTML('afterend', `<div class="invalid-feedback">${errorMessages}</div>`);
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
