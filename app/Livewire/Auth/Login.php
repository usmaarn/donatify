<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    #[Rule('required|email')]
    public $email;

    #[Rule('required|string')]
    public $password;

    public function login(){
        $this->validate();

        if (\Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        $this->addError('wrong_details', 'The provided credentials do not match our records.');
    }

    public function render()
    {
        return view('auth.login');
    }
}
