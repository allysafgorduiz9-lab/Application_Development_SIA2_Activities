<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string'], // Added Role validation
            'purok' => ['required', 'string'],
            'age' => ['required', 'integer'],
            'birthday' => ['required', 'date'],
            'classification' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Saves the role chosen in the form
            'purok' => $request->purok,
            'age' => $request->age,
            'birthday' => $request->birthday,
            'classification' => $request->classification,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Part 2 Challenge: Redirect users based on role
        if ($user->role === 'Admin') {
            return redirect('/admin/dashboard');
        }

        return redirect(route('dashboard', absolute: false));
    }
}