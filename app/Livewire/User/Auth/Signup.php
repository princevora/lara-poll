<?php

namespace App\Livewire\User\Auth;

use Livewire\Component;

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

    public bool $remember;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.user.auth.signup');
    }

    public function save()
    {
        
    }
}
