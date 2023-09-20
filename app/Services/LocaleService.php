<?php

namespace App\Services;

class LocaleService
{
    private UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param string $locale
     * @return void
     */
    public function setLocale(string $locale)
    {
        if (auth()->check()) $this->userService->update(['locale' => $locale], auth()->id());
        app()->setLocale($locale);
        session()->put('locale', $locale);
    }
}
