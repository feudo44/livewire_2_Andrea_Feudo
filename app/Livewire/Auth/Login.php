<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected $messages = [
        'email.required' => 'L\'email è obbligatoria',
        'email.email' => 'Inserisci un indirizzo email valido',
        'password.required' => 'La password è obbligatoria',
    ];

    public function authenticate()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            return $this->redirectRoute('home');
        }

        $this->password = '';
        $this->addError('email', 'Email o password non corrette');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}