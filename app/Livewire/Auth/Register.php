<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];
    }

    protected $messages = [
        'name.required' => 'Il nome utente è obbligatorio',
        'name.min' => 'Il nome richiede almeno 3 caratteri',
        'email.required' => 'L\'email è obbligatoria',
        'email.email' => 'Inserisci un indirizzo email valido',
        'email.unique' => 'Questa email è già registrata',
        'password.required' => 'La password è obbligatoria',
        'password.min' => 'La password richiede almeno 8 caratteri',
        'password.confirmed' => 'Le due password non coincidono',
    ];

    public function save()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        Auth::login($user);
        session()->regenerate();

        return $this->redirectRoute('home');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}