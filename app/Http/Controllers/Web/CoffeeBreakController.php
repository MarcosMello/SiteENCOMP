<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoffeeBreakRequest;
use App\Http\Requests\UpdateCoffeeBreakRequest;
use App\Models\CoffeeBreak;
use App\Services\CoffeeBreakService;

class CoffeeBreakController extends Controller
{
    private CoffeeBreakService $coffeeBreakService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CoffeeBreakService $coffeeBreakService)
    {
        $this->coffeeBreakService = $coffeeBreakService;
    }

    /**
     * Display a listing of the coffeeBreaks
     *
     * @param \App\Models\CoffeeBreak $model
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $coffeeBreaks = $this->coffeeBreakService->index();
        return view('admin.coffeeBreak.index', compact('coffeeBreaks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.coffeeBreak.crud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCoffeeBreakRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCoffeeBreakRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $this->coffeeBreakService->create($data);
        return redirect()->route('coffeeBreak.index')->with('success', __('CoffeeBreak created with success!'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return string|false
     */
    public function show(int $id): bool|string
    {
        $coffeeBreak = $this->coffeeBreakService->show($id);
        return json_encode($coffeeBreak);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $coffeeBreak = $this->coffeeBreakService->show($id);
        return view('admin.coffeeBreak.crud', compact('coffeeBreak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCoffeeBreakRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCoffeeBreakRequest $request, int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $data = $request->validated();
        $this->coffeeBreakService->update($data, $id);
        return redirect(route('coffeeBreak.index'))->with('success', __('CoffeeBreak updated with success!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->coffeeBreakService->destroy($id);
        return redirect()->route('coffeeBreak.index')->with('success', __('CoffeeBreak deleted with success!'));
    }
}
