<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocaleRequest;
use App\Services\LocaleService;

class LocaleController extends Controller
{
    private LocaleService $localeService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LocaleService $localeService)
    {
        $this->localeService = $localeService;
    }

    /**
     * @param LocaleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setLocale(LocaleRequest $request): \Illuminate\Http\RedirectResponse
    {
        $locale = $request->validated('locale');
        $this->localeService->setLocale($locale);
        return redirect()->back()->with(__('Language changed with success!'));
    }
}
