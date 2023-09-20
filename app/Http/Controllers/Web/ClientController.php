<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Services\ClientService;

class ClientController extends Controller
{
    private ClientService $clientService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\View\View
    {
        $clients = $this->clientService->index();
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.client.crud');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(ClientCreateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $this->clientService->create($data);
        return redirect()->route('client.index')->with('success', __('Client created with success!'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return string|false
     */
    public function show(int $id): bool|string
    {
        $client = $this->clientService->show($id);
        return json_encode($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $client = $this->clientService->show($id);
        return view('admin.client.crud', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ClientUpdateRequest $request, int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $data = $request->validated();
        $this->clientService->update($data, $id);
        return redirect()->route('client.index')->with('success', __('Client updated with success!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->clientService->destroy($id);
        return redirect()->route('client.index')->with('success', __('Client deleted with success!'));
    }
}
