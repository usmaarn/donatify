<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Register extends Component
{

    #[Rule(('required|string|min:9'))]
    public $name;

    #[Rule('required|email|unique:'.User::class)]
    public $email;

    #[Rule('required|string|confirmed|min:8')]
    public $password;

    public $password_confirmation;

    public function submit()
    {
        $this->validate();

        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        Auth::login($user);
        session()->regenerate();

        return $this->redirect(route('dashboard'));

    }

    public function render()
    {
        return view('auth.register');
    }
}
