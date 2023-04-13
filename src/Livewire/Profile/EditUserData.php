<?php

namespace PwaBlui\Livewire\Profile;

use Livewire\Component;
use PwaBlui\Models\User;

class EditUserData extends Component
{
    public User $user;

    protected array $rules = [
        'user.username' => 'required|string',
        'user.email' => 'required|email',
    ];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    public function save()
    {
        $this->validate();

        $this->user->save();

        session()->flash('message', 'Profile successfully updated.');
    }

    public function render()
    {
        return view('pwablui::livewire.profile.edit-user-data');
    }
}
