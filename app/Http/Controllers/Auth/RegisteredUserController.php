<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $user = new User();

        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $current_date = date('Y-m-d');
        $current_date_minus_18 = date('Y-m-d', strtotime('-18 years', strtotime($current_date)));

        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', 'min:3', 'max:50'],
                'surname' => ['required', 'string', 'min:3', 'max:50'],
                'birth_date' => ['required ', 'date_format:Y-m-d', 'before_or_equal:' . $current_date_minus_18],
                'email' => ['required', 'string', 'email', 'max:50', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'password_confirmation' => ['required', 'same:password'],
            ],
            [
                'name.required' => 'Devi inserire il tuo nome',
                'name.string' => 'Il tuo nome deve essere una stringa',
                'name.min' => 'Il tuo nome deve essere lungo almeno 3 caratteri',
                'name.max' => 'Il tuo nome deve essere lungo al massimo 50 caratteri',

                'surname.required' => 'Devi inserire il tuo cognome',
                'surname.string' => 'Il tuo cognome deve essere una stringa',
                'surname.min' => 'Il tuo cognome deve essere lungo almeno 3 caratteri',
                'surname.max' => 'Il tuo cognome deve essere lungo al massimo 50 caratteri',

                'birth_date.required' => 'Devi inserire la tua data di nascita',
                'birth_date.date_format' => 'La tua data di nascita deve essere nel formato mm/gg/aaaa',
                'birth_date.before_or_equal' => 'Devi avere almeno 18 anni per registrarti',

                'email.required' => 'Devi inserire la tua email',
                'email.string' => 'La tua email deve essere una stringa',
                'email.email' => 'La tua email deve essere nel formato',
                'email.unique' => 'Questa password è già registrata',
                'email.max' => 'La tua email deve essere lunga al massimo 255 caratteri',

                'password.required' => 'Devi inserire la tua password',
                'password.confirmed' => 'La tua password deve essere uguale alla password di conferma',
                'password.min' => 'La tua password deve essere lunga almeno 8 caratteri',
                'password.max' => 'La tua password deve essere lunga al massimo 50 caratteri',
                'password.regex' => 'La tua password deve contenere almeno una lettera minuscola, una lettera maiuscola',

                'password_confirmation.required' => 'Devi inserire la tua password di conferma',
                'password_confirmation.same' => 'La tua password di conferma deve essere uguale alla tua password',
            ],
        );

        $validated = $validator->validated();

        $user = User::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'birth_date' => $validated['birth_date'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
