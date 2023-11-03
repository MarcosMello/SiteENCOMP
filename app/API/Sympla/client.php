<?php

namespace App\API\Sympla;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

define("BASE_URI", "https://api.sympla.com.br/public/");

class client{
    private static ?GuzzleClient $_guzzleInstance = null;

    private static function getGuzzleClient(): GuzzleClient
    {
        if (is_null(self::$_guzzleInstance)) {
            $guzzleClient = new GuzzleClient([
                'base_uri' => BASE_URI,
                'headers' => [
                    's_token' => env('SYMPLA_API')
                ],
            ]);

            self::$_guzzleInstance = $guzzleClient;
        }

        return self::$_guzzleInstance;
    }

    public static function get(string $endpoint, int $page = 1, bool $fullBody = false) : array
    {
        $client = self::getGuzzleClient();

        try{
            $response = $client
                ->request("GET", $endpoint . "?page=" . $page);
        } catch (GuzzleException $e){
            return [];
        }

        $responseBody = json_decode($response->getBody());

        return $fullBody ? array($responseBody) : $responseBody->data;
    }
}
