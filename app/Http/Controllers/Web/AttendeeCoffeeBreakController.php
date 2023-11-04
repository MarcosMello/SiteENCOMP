<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchAttendee_CoffeeBreakRequest;
use App\Http\Requests\StoreAttendee_CoffeeBreakRequest;
use App\Http\Requests\UpdateAttendee_CoffeeBreakRequest;
use App\Http\Requests\UpdateAvailability_Attendee_CoffeeBreakRequest;
use App\Services\Attendee_CoffeeBreakService;

class AttendeeCoffeeBreakController extends Controller
{
    private Attendee_CoffeeBreakService $attendee_CoffeeBreakService;

    public function __construct(Attendee_CoffeeBreakService $attendee_CoffeeBreakService){
        $this->attendee_CoffeeBreakService = $attendee_CoffeeBreakService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $attendeeCoffeeBreaks = $this->attendee_CoffeeBreakService->index();
        return view('admin.attendeeCoffeeBreak.index', compact('attendeeCoffeeBreaks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendee_CoffeeBreakRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendee_CoffeeBreakRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendee_CoffeeBreak  $atendee_CoffeeBreak
     * @return \Illuminate\Http\Response
     */
    public function show(Attendee_CoffeeBreak $attendee_CoffeeBreak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendee_CoffeeBreak  $atendee_CoffeeBreak
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendee_CoffeeBreak $attendee_CoffeeBreak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendee_CoffeeBreakRequest  $request
     * @param  \App\Models\Attendee_CoffeeBreak  $atendee_CoffeeBreak
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendee_CoffeeBreakRequest $request, Attendee_CoffeeBreak $attendee_CoffeeBreak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendee_CoffeeBreak  $atendee_CoffeeBreak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee_CoffeeBreak $attendee_CoffeeBreak)
    {
        //
    }

    public function getAttendeeCoffeeBreaks(SearchAttendee_CoffeeBreakRequest $requests){
        $data = $requests->validated();

        $attendeeCoffeeBreaks = $this->attendee_CoffeeBreakService->showByAttendeeID($data['attendee_id']);

        return !$attendeeCoffeeBreaks->isEmpty() ?
            view('qrcodeScanner.form', compact("attendeeCoffeeBreaks")) :
            redirect('scanner')->with('message',
                "Attendee associated with uuid " . $data['attendee_id'] . " was not found.");
    }

    public function updateAvailability(UpdateAvailability_Attendee_CoffeeBreakRequest $request){
        $data = $request->validated();

        $attendeeCoffeeBreak = $this->attendee_CoffeeBreakService->updateAvailability($data['id'], $data['is_available']);

        return redirect('scanner')->with('message', $attendeeCoffeeBreak->attendee->name . " Coffee Break " .
            $attendeeCoffeeBreak->event_coffeeBreak->coffeeBreak->name . " availability set to " .
            $attendeeCoffeeBreak->is_available . ".");
    }
}
