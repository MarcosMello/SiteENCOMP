<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    private ProfileService $profileService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit(): \Illuminate\View\View
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param ProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $this->profileService->update($data);
        return back()->with(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param PasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $this->profileService->update($data);
        return back()->with(__('Password successfully updated.'));
    }
}
