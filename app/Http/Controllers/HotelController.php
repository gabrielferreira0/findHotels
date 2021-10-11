<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class HotelController extends Controller
{

    public function index()
    {
        return view('home');
    }


    public function getHotels()
    {
        $response = Http::get('https://buzzvel-interviews.s3.eu-west-1.amazonaws.com/hotels.json');
        $hotels = json_decode($response->body());
        return $hotels->message;

    }

    public function getNearbyHotels(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $hotels = $this->getHotels();

        $result = [];

        foreach ($hotels as $hotel) {

            $hotel_latitute = floatval($hotel[1]);
            $hotel_longitude = floatval($hotel[2]);
            $hotel_distance = $this->distance($latitude, $longitude, $hotel_latitute, $hotel_longitude);
            //limit radius 50km
            if ($hotel_distance <= 50) {
                $result[] = [
                    'hotel_name' => $hotel[0],
                    'hotel_distance' => $hotel_distance,
                    'hotel_price' => $hotel[3]
                ];
            }
        }
        return view('hotels', compact('result'));
    }

    function distance($lat1, $lon1, $lat2, $lon2)
    {
        //Formula  Haversine  PHP
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $lon1 = deg2rad($lon1);
        $lon2 = deg2rad($lon2);

        $dist = (6371 * acos(cos($lat1) * cos($lat2) * cos($lon2 - $lon1) + sin($lat1) * sin($lat2)));
        $dist = number_format($dist, 2, '.', '');


        return $dist;
    }

}
