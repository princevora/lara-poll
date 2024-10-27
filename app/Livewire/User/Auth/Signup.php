<?php

namespace App\Livewire\User\Auth;

use App\Models\Poll;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Illuminate\Http\Request;

class Signup extends Component
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string 
     */
    public string $email;

    /**
     * @var string
     */
    public string $password;

    /**
     * @var bool
     */
    public bool $remember;

    /**
     * @var string|null
     */
    public ?string $poll_id;

    /**
     * @var bool
     */
    public bool $onBoarding = false;

    public $poll;

    public function mount(Request $request)
    {
        $this->poll_id = $request->poll_id;
        
        // Check if the user is redirected from onboarding and have the poll id
        if(!is_null($this->poll_id)) {
            $this->onBoarding = true;
            
            // Find poll
            $poll = Poll::where('poll_id', $this->poll_id)
                        ->where('status', 0)
                        ->first();

            // Set the poll instance
            if(!is_null($poll)) $this->poll = $poll;
            
            // Show 404
            abort_if(is_null($poll), 404); 
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.user.auth.signup');
    }

    public function save(Request $request)
    {
        $this->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(User::where('email', $this->email)->exists()) 
            throw ValidationException::withMessages(['email' => 'The provide email already exists']);

        // Save the user
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password'=> Hash::make($this->password)
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        // activate the poll
        if($this->onBoarding) 
            Poll::where('poll_id', $this->poll_id)
                ->update([
                    'status'     => 1, 
                    'created_by' => 1,
                    'user_id'    => $user->id 
                ]);
        
        // Login
        Auth::login($user, $this->remember);
        
        // Regenerate the session
        session()->regenerate();
    }
}
