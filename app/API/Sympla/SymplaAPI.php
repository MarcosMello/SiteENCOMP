<?php

namespace App\API\Sympla;

use http\Exception;

class SymplaAPI extends client {
    public static function getAllEvents() : array{
        $endpoint = "v4/events";

        return self::getAllFromEndpoint($endpoint);
    }

    public static function getParticipantsURL($event_id, $page = 1) : string {
        return "v3/events/" . $event_id . "/participants";
    }

    public static function getParticipantURL($event_id, $ticket_number) : string {
        return "v3/events/". $event_id . "/participants/ticketNumber/" . $ticket_number;
    }

    public static function getAllFromEndpoint($endpoint) : array{
        $apiResponse = self::get($endpoint, fullBody: true);

        if (empty($apiResponse)) { return []; }
        $apiResponse = $apiResponse[0];

        $endpointObject = $apiResponse->data;

        for ($i = 2; $i <= ($apiResponse->pagination->total_page ?? 0); $i++){
            $endpointObject = array_merge($endpointObject, self::get($endpoint, $i));
        }

        return is_array($endpointObject) ? $endpointObject : array($endpointObject);
    }
}
