<?php

namespace Distinc\Wayout\Service;

class ContactService
{

    public static function fixPayload($data)
    {
        $payload = [];

        foreach($data as $contact){

            $values = json_decode($contact['details'][0]['value'], true);

            $payload = [
                'first_name' => $contact['first_name'],
                'last_name' => $contact['last_name'],
                'number' => $values[0]['number'],
                'email' => $values[0]['email'],
                'id' => $contact['id']
            ];
        }
        return $payload;
    }
}