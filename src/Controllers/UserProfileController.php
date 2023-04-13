<?php

namespace PwaBlui\Controllers;

class UserProfileController
{
    public function index()
    {
        return view('pwablui::profile.index', [

            'sections' => config('profile.sections', [
                'profile.edit-user-data',
                'profile.manage-passkeys',
            ]),

        ]);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
