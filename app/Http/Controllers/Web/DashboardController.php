<?php

namespace App\Http\Controllers\Web;

use App\API\Sympla\SymplaAPI;
use App\Http\Controllers\Controller;
use App\Models\Attendee;
use App\Models\Event_Ticket_CoffeeBreak;
use App\Services\Attendee_CoffeeBreakService;
use App\Services\AttendeeService;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{
    private AttendeeService $attendeeService;
    private Attendee_CoffeeBreakService $attendee_CoffeeBreakService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AttendeeService $attendeeService, Attendee_CoffeeBreakService $attendee_CoffeeBreakService){
        $this->attendee_CoffeeBreakService = $attendee_CoffeeBreakService;
        $this->attendeeService = $attendeeService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        return view('dashboard');
    }

    /**
     * @throws \Throwable
     */
    public function startAttendeesCoffeeBreaks(){
        DB::transaction(function() {
            $eventIDs = [2172919];

            foreach ($eventIDs as $eventID){
                $allParticipants = SymplaAPI::getAllFromEndpoint(SymplaAPI::getParticipantsURL($eventID));

                foreach ($allParticipants as $participant){
                    $attendeeAttributes = [
                        'name' => $participant->first_name . " " . $participant->last_name,
                        'email' => $participant->email,
                        'CPF' => preg_replace("/[^0-9]/", "", $participant->custom_form[0]->value),
                    ];

                    $attendee = $this->attendeeService->create($attendeeAttributes);
                    $eventCoffeeBreaks = Event_Ticket_CoffeeBreak::where('ticket_name', $participant->ticket_name)->get();

                    foreach ($eventCoffeeBreaks as $eventCoffeeBreak){
                        $attendeeCoffeeBreak = [
                            'attendee_uuid' => $attendee->id,
                            'event_coffee_break_id' => $eventCoffeeBreak->id
                        ];

                        $this->attendee_CoffeeBreakService->create($attendeeCoffeeBreak);
                    }
                }
            }
        });

        return view('dashboard');
    }

    public function generateAttendeesQRCode(){
        $attendees = Attendee::all();
        $QRCodeGenerator = QrCode::format('svg')->errorCorrection('H');

        foreach ($attendees as $attendee){
            Storage::put("public/qrcodes/" . preg_replace('/\s+/', '', $attendee->name) . ".svg",
                $QRCodeGenerator->generate($attendee->id));
        }

        return view('dashboard');
    }
}
