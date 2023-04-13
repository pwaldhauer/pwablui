<?php

namespace PwaBlui\Livewire\Profile;

use Livewire\Component;

class ManageApiKeys extends Component
{
    public function createApiKey()
    {
        $token = auth()->user()->createToken('ApiKey '.date('Y-m-d H:i:s'));
        session()->flash('message', 'Created API-Key: '.$token->plainTextToken);
    }

    public function deleteApiKey($id)
    {
        $key = auth()->user()->tokens()
            ->where('id', $id)
            ->first();

        $key->delete();
    }

    public function render()
    {
        return view('pwablui::livewire.profile.manage-apikeys');
    }
}
