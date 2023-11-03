<?php

namespace App\Http\Controllers\Web;

use App\API\Sympla\SymplaAPI;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEvent_Ticket_CoffeeBreakRequest;
use App\Http\Requests\UpdateEvent_Ticket_CoffeeBreakRequest;
use App\Models\CoffeeBreak;
use App\Models\Event_Ticket_CoffeeBreak;
use App\Services\Event_Ticket_CoffeeBreakService;

class EventTicketCoffeeBreakController extends Controller
{
    private Event_Ticket_CoffeeBreakService $event_Ticket_CoffeeBreakService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Event_Ticket_CoffeeBreakService $event_Ticket_CoffeeBreakService)
    {
        $this->event_Ticket_CoffeeBreakService = $event_Ticket_CoffeeBreakService;
    }

    /**
     * Display a listing of the event_Ticket_CoffeeBreaks
     *
     * @param \App\Models\Event_Ticket_CoffeeBreak $model
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $event_Ticket_CoffeeBreaks = $this->event_Ticket_CoffeeBreakService->index();
        return view('admin.eventTicketCoffeeBreak.index', compact('event_Ticket_CoffeeBreaks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $events = SymplaAPI::getAllEvents();
        $coffeeBreaks = CoffeeBreak::all();
        return view('admin.eventTicketCoffeeBreak.crud', compact('coffeeBreaks', 'events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEvent_Ticket_CoffeeBreakRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreEvent_Ticket_CoffeeBreakRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $this->event_Ticket_CoffeeBreakService->create($data);
        return redirect()->route('eventTicketCoffeeBreak.index')->with('success', __('Event_Ticket_CoffeeBreak created with success!'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return string|false
     */
    public function show(int $id): bool|string
    {
        $event_Ticket_CoffeeBreak = $this->event_Ticket_CoffeeBreakService->show($id);
        return json_encode($event_Ticket_CoffeeBreak);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        $events = SymplaAPI::getAllEvents();
        $coffeeBreaks = CoffeeBreak::all();
        $event_Ticket_CoffeeBreak = $this->event_Ticket_CoffeeBreakService->show($id);
        return view('admin.eventTicketCoffeeBreak.crud', compact('event_Ticket_CoffeeBreak', 'coffeeBreaks', 'events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEvent_Ticket_CoffeeBreakRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateEvent_Ticket_CoffeeBreakRequest $request, int $id): \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $data = $request->validated();
        $this->event_Ticket_CoffeeBreakService->update($data, $id);
        return redirect(route('eventTicketCoffeeBreak.index'))->with('success', __('Event_Ticket_CoffeeBreak updated with success!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $this->event_Ticket_CoffeeBreakService->destroy($id);
        return redirect()->route('eventTicketCoffeeBreak.index')->with('success', __('Event_Ticket_CoffeeBreak deleted with success!'));
    }
}
