<?php

namespace PwaBlui\Livewire\Profile;

use Livewire\Component;

class ManagePasskeys extends Component
{
    public function deletePasskey($id)
    {
        $passkey = WebAuthnCredential::query()
            ->where('id', $id)
            ->where('authenticatable_id', auth()->id())
            ->first();

        $passkey->delete();
    }

    public function render()
    {
        return view('pwablui::livewire.profile.manage-passkeys');
    }
}
