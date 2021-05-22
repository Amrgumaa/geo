<?php

namespace App\Http\Controllers;

use App\Models\geoip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

class GeoipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $ip = $request->ip();
        $access_key = '8090a7ae09635e63ec56924466d7381a';

        // Initialize CURL:
        $ch = curl_init('http://api.ipstack.com/'.$ip.'?access_key='.$access_key.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $api_result = json_decode($json, true);

        // Output the "id" object from the "timezone" field
        dd($api_result);

        // //jenssegers/agent test
        // $agent = new Agent();
        //     //    $device = $agent->device();
        //        $device = $agent->isRobot();
        //     //  $platform = $agent->platform();
        //     //  $platformversion = $agent->version($platform);
        //     //  $browser = $agent->browser();
        //     //  $browserversion = $agent->version($browser);
        //     //  $robot = $agent->robot();
        //        dd($device);
        //     //Tronan GEOIP test
        //     // $ip = request()->header('X-Forwarded-For');
        //    // $data =geoip()->getLocation();
        //     // dd($data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\geoip  $geoip
     * @return \Illuminate\Http\Response
     */
    public function show(geoip $geoip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\geoip  $geoip
     * @return \Illuminate\Http\Response
     */
    public function edit(geoip $geoip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\geoip  $geoip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, geoip $geoip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\geoip  $geoip
     * @return \Illuminate\Http\Response
     */
    public function destroy(geoip $geoip)
    {
        //
    }
//     public function trackUserActivity(Request $request,){

//     //    $geo = Geoip::create([
//     //         'user_id' => Auth::id(),
//     //         'ip_address' => $request->getClientIP(),
//     //     ]);

//       }
}
