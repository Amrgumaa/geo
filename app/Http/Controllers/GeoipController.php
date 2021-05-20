<?php

namespace App\Http\Controllers;

use App\Models\geoip;
use Illuminate\Http\Request;


class GeoipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $ip = request()->header('X-Forwarded-For');
        $data= geoip()->getLocation();
        dd($data);
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
        //
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
}
