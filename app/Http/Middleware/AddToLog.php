<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Torann\GeoIP\GeoIP;
use Jenssegers\Agent\Agent;




class AddToLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

      $agent=new Agent();
      $platform= $agent->platform();
      $browser = $agent->browser();
      $isocode= geoip()->getLocation()->toArray()['iso_code'];
      $country = country($isocode);

         if(auth()->user()) {
        Activity::create([
            'user_id' => auth()->user()->id,
            'user_name'=> auth()->user()->name,
            'ip_address' => $request->getClientIP(),
            'url' => $request->fullUrl(),
            'ip' =>  geoip()->getLocation()->toArray()['ip'],
            'iso_code' => geoip()->getLocation()->toArray()['iso_code'],
            'country' => geoip()->getLocation()->toArray()['country'],
            'city' => geoip()->getLocation()->toArray()['city'],
            'state' => geoip()->getLocation()->toArray()['state'],
            'state_name' => geoip()->getLocation()->toArray()['state_name'],
            'postal_code' => geoip()->getLocation()->toArray()['postal_code'],
            'lat' => geoip()->getLocation()->toArray()['lat'],
            'lon' => geoip()->getLocation()->toArray()['lon'],
            'timezone' => geoip()->getLocation()->toArray()['timezone'],
            'continent' =>geoip()->getLocation()->toArray()['continent'],
            'currency' => geoip()->getLocation()->toArray()['currency'],
            'default' => geoip()->getLocation()->toArray()['default'],
            'device' => $agent->device(),
            'platform' => $agent->platform(),
           'platformversion' =>$agent->version($platform),
           'browser' =>$agent->browser(),
          'browserversion' => $agent->version($browser),
          'is_robot'=>$agent->isRobot(),
          'robot_name' =>$agent->robot(),
          'country_flag' =>$country->getEmoji(),
          'language_local' =>$country->getLocales()[0],
          'language' =>$country->getLanguage(),
          'calling_code' =>$country->getCallingCode(),
          'region' =>$country->getRegion(),
          'sub_region' =>$country->getSubregion(),
          'world_region' =>$country->getWorldRegion(),

        ]);
      }
        else {

            Activity::create([

                'user_name'=> 'guest',
                'ip_address' => $request->getClientIP(),
                'url' => $request->fullUrl(),
                'ip' =>  geoip()->getLocation()->toArray()['ip'],
                'iso_code' => geoip()->getLocation()->toArray()['iso_code'],
                'country' => geoip()->getLocation()->toArray()['country'],
                'city' => geoip()->getLocation()->toArray()['city'],
                'state' => geoip()->getLocation()->toArray()['state'],
                'state_name' => geoip()->getLocation()->toArray()['state_name'],
                'postal_code' => geoip()->getLocation()->toArray()['postal_code'],
                'lat' => geoip()->getLocation()->toArray()['lat'],
                'lon' => geoip()->getLocation()->toArray()['lon'],
                'timezone' => geoip()->getLocation()->toArray()['timezone'],
                'continent' =>geoip()->getLocation()->toArray()['continent'],
                'currency' => geoip()->getLocation()->toArray()['currency'],
                'default' => geoip()->getLocation()->toArray()['default'],
                'device' => $agent->device(),
                'platform' => $agent->platform(),
               'platformversion' =>$agent->version($platform),
               'browser' =>$agent->browser(),
              'browserversion' => $agent->version($browser),
              'is_robot'=>$agent->isRobot(),
              'robot_name' =>$agent->robot(),
              'country_flag' =>$country->getEmoji(),
              'language_local' =>$country->getLocales()[0],
              'language' =>$country->getLanguage(),
              'calling_code' =>$country->getCallingCode(),
              'region' =>$country->getRegion(),
              'sub_region' =>$country->getSubregion(),
              'world_region' =>$country->getWorldRegion(),

                ]);

        }

         return $response;
    }
}
