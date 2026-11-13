<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


#[Layout('layouts.app')]
#[Title('Profile')]
class Profile extends Component
{
    public string $name = '';
    public string $username = '';
    public string $no_whatsapp = '';
    public string $alamat = '';

    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount()
{
    $user = Auth::user();

    $this->name = $user->name ?? '';
    $this->username = $user->username ?? '';
    $this->no_whatsapp = $user->no_whatsapp ?? '';
    $this->alamat = $user->alamat ?? '';
}

    public function saveProfile()
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    $this->validate([
        'name' => 'required|string|max:255',
        'username' => [
            'nullable',
            'string',
            'max:255',
            Rule::unique('users', 'username')->ignore($user->id),
        ],
        'no_whatsapp' => 'nullable|string|max:20',
        'alamat' => 'nullable|string|max:255',
    ]);

    $user->update([
        'name' => $this->name,
        'username' => $this->username,
        'no_whatsapp' => $this->no_whatsapp,
        'alamat' => $this->alamat,
    ]);

    session()->flash('success', 'Profil berhasil diperbarui!');
}

    public function changePassword()
{
    $this->validate([
        'current_password' => 'required|current_password',
        'password' => 'required|string|min:8|confirmed',
    ]);

    /** @var \App\Models\User $user */
    $user = Auth::user();

    $user->update([
        'password' => Hash::make($this->password),
    ]);

    $this->reset([
        'current_password',
        'password',
        'password_confirmation',
    ]);

    session()->flash('password_success', 'Password berhasil diubah!');
}

    public function render()
    {
        return view('livewire.profile');
    }
}
