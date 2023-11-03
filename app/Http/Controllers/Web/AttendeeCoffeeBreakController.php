<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendee_CoffeeBreakRequest;
use App\Http\Requests\UpdateAttendee_CoffeeBreakRequest;
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
}
