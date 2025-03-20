<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
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
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class,
                function ($attribute, $value, $fail) {
                    $blockedDomains = [
                        'example.com', 'test.com', 'mailinator.com', 'tempmail.com', '10minutemail.com',
                        'guerrillamail.com', 'throwawaymail.com', 'yopmail.com', 'fakeinbox.com',
                        'dispostable.com', 'trashmail.com', 'spambox.us', 'sharklasers.com',
                        'getairmail.com', 'mailnesia.com', 'mytemp.email', 'maildrop.cc',
                        'tmail.com', 'mailnator.com', 'inboxbear.com', 'mohmal.com'
                    ];
                    $emailDomain = substr(strrchr($value, "@"), 1); // Ambil domain email
        
                    if (in_array($emailDomain, $blockedDomains)) {
                        $fail('Email dengan domain ' . $emailDomain . ' tidak diizinkan.');
                    }
                }
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:5120'],
        ]);
    
        // Proses Avatar (jika ada)
        if ($request->hasFile('avatar')) {
            $filename = time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $avatarPath = $request->file('avatar')->storeAs('avatars', $filename, 'public');
        } else {
            $avatarPath = null;
        }
    
        // Simpan User ke Database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatarPath,
        ]);
    
        event(new Registered($user));
    
        // Beri role user
        $user->assignRole('user');
    
        // Login user setelah registrasi
        Auth::login($user);
    
        return redirect(route('dashboard', absolute: false));
    }
}
