<?php

namespace App\Livewire\User\Auth;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $password;

    public bool $remember = false;

    public function render()
    {
        return view('livewire.user.auth.login');
    }

    public function save(Request $request)
    {
        $this->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        $user = User::where('email', $this->email)
                    ->first();

        // Throw error if the password is wrong
        if (!Hash::check($this->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => 'The provided password is incorrect.'
            ]);
        }

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        $user = User::where('email', $this->email)->first();
        
        // Login
        Auth::login($user, $this->remember);
        
        // Regenerate the session
        session()->regenerate();
    }
}
