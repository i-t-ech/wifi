<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class MpesaController extends Controller
{
    public function stkPush(Request $request)
    {

        

        function convertToKenyanNumber($phoneNumber) {
            // Remove any non-numeric characters from the phone number
            $phoneNumber = preg_replace('/\D/', '', $phoneNumber);
        
            // Check if the phone number starts with '07' (local Kenyan format)
            if (substr($phoneNumber, 0, 2) === '07') {
                // Replace '07' with '254'
                $phoneNumber = '254' . substr($phoneNumber, 2);
            } elseif (substr($phoneNumber, 0, 1) === '0') {
                // Replace '0' with '254' for numbers starting with '0'
                $phoneNumber = '254' . substr($phoneNumber, 1);
            }
        
            return $phoneNumber;
        }


        
        $phone = Auth::user()->phone; // Get the logged-in user's phone number from the database

        $phoneNumber = convertToKenyanNumber($phone);


        // MPESA_CONSUMER_KEY=aozU18dMq45rv3WFf9RZL4ANJhYL4lEeyVNlDuL1Brzr1waI
        // MPESA_CONSUMER_SECRET=7DGfAuFBUG0e8R1Aov45lzSFERNlIAloqPLcuuDuGCU2JLBokQWIXTwadkw02k4l

        $amount = $request->input('amount'); // Package amount
        $package = $request->input('package'); // Package name

        $shortcode = env('MPESA_SHORTCODE');
        $passkey = env('MPESA_PASSKEY');
        $consumerKey = env('MPESA_CONSUMER_KEY');

        $consumerSecret = env('MPESA_CONSUMER_SECRET');
        $callbackUrl = env('MPESA_CALLBACK_URL');
        
        $timestamp = date('YmdHis');
        $password = base64_encode($shortcode . $passkey . $timestamp);
        // dd($request);
        // Generate access token
        $accessToken = $this->getAccessToken($consumerKey, $consumerSecret);


       

        // MPESA STK Push request
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        
        
        try {

            $data = [
                'BusinessShortCode' => $shortcode,
                'Password' => $password,
                'Timestamp' => $timestamp,
                'TransactionType' => 'CustomerBuyGoodsOnline',
                'Amount' => 2,
                'PartyA' => $phoneNumber,
                'PartyB' => $shortcode,
                'PhoneNumber' => $phoneNumber,
                'CallBackURL' => $callbackUrl,
                'AccountReference' => 'YourReference',    
                'TransactionDesc' => 'test transaction'
            ];

            // dd($data);
            $response = Http::withToken($accessToken)->post($url,data:$data );
            
        } catch (\Throwable $e) {
        
            return response ($e);
        }


        $res = json_decode($response);

        return $res;
    }

    private function getAccessToken($consumerKey, $consumerSecret)
    {
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        
        $client = new Client();
        // $response = $client->get($url, [
        //     'auth' => [$consumerKey, $consumerSecret],
        // ]);

        // dd($consumerKey,$consumerSecret);

        $response = Http::withBasicAuth($consumerKey,$consumerSecret)->get($url);

        $body = json_decode($response->getBody()->getContents());

    

        return $body->access_token;
    }
}