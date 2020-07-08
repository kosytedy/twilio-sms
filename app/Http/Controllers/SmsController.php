<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'numbers' => ['required','string'],
            'message' => ['required','string']
        ]);

        $sid    = env( 'TWILIO_SID' );
        $token  = env( 'TWILIO_TOKEN' );
        $client = new Client( $sid, $token );

        $numbers = explode(',', $request->numbers);

        $totalNumbers = count($numbers);
        $totalSent = 0;
        try {
            
            foreach($numbers as $number)
            {
                $client->messages->create(
                    $number,
                    [
                        'from' => env('TWILIO_FROM'),
                        'body' => $request->message
                    ]
                );
                $totalSent++;
            }

            return back()->with('status', 'Message sent to '. $totalSent.' out of '.$totalNumbers.' numbers successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error encountered while sending message. '. $totalSent.' out of '.$totalNumbers.' messages was sent so far.
            Error: '.$th->getMessage());
        }
    }
}
