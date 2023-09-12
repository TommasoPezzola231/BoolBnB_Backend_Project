@extends('layouts.app')

@section('content')

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

    <script>
        function login(ev) {
            ev.preventDefault();

            const formData = new FormData(ev.target);

            axios.post('/login', formData)
                .then(function(response) {

                    window.location.href = '{{ route('admin.dashboard') }}';
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
                                // this.nextElementSibling.remove();



                            });
                        });


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
