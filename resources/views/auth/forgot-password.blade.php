@extends('layouts.app')

@section('content')
{{-- <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Inserisci l'indirizzo email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Invia link per il reset della password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="col-12 d-flex align-items-center">
        <div class="card-body p-lg-5 text-black">

            <div class="d-flex align-items-center mb-3 pb-1">
                <img src="{{ asset('images/logo/Bool_Bnb_Black.png') }}" alt="Logo" style="max-width: 100px;">
                <h3 class="m-0">BoolBnB</h3>
            </div>

            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Link per il reset della password</h5>

            <p class="mb-4">Inserisci l'indirizzo email con cui ti sei registrato e ti invieremo un link per il reset della password.</p>

            <form method="POST" action="{{ route('password.email') }}" onsubmit="passwordSend(event)">
                @csrf

                <div class="mb-4">
                    <input id="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <label for="email" class="form-label">{{ __('email') }}</label>
                </div>

                <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">{{ __('Invia link per il reset della password') }}</button>
                </div>

            </form>

            @if (session('status'))
                <div id="success-message" class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div id="error-message" class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

        </div>
    </div>

    {{-- script --}}
    <script>
        function passwordSend(event) {
            event.preventDefault();

            const formData = new FormData(event.target);

            axios.post('/forgot-password', formData)
                .then(function(response) {

                    if (response.data.status === 'success') {

                        showAlert('success', response.data.message);

                        event.target.reset();
                    } else {

                        setTimeout(function() {
                            window.location.href = '{{ route('login') }}';
                        }, 2000);
                    }
                })
                .catch(function(error) {

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

                    const inputElements = document.querySelectorAll('.is-invalid');
                    inputElements.forEach(function(inputElement) {
                        inputElement.addEventListener('input', function() {
                            this.classList.remove('is-invalid');
                            this.nextElementSibling.remove();
                        });
                    });

                    const errorMessages = document.querySelectorAll('.invalid-feedback');
                    if (errorMessages.length === 0) {
                        const form = document.getElementById('form');
                        form.submit();
                        window.location.href = '{{ route('login') }}';
                    }
                });
        }
    </script>
@endsection
