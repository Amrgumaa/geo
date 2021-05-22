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
      $isocode=geoip()->getLocation()->toArray()['iso_code'];

         if(auth()->user()) {
        Activity::create([
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
              'country_flag' =>country($isocode)->getEmoji(),
              'language_local' =>country($isocode)->getLocales()[0],
              'language' =>country($isocode)->getWorldRegion(),
              'calling_code' =>country($isocode)->getCallingCode(),
              'region' =>country($isocode)->getRegion(),
              'sub_region' =>country($isocode)->getSubregion(),
              'world_region' =>country($isocode)->getWorldRegion(),

        ]);
      }
        else {

            Activity::create([
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
              'country_flag' =>country($isocode)->getEmoji(),
              'language_local' =>country($isocode)->getLocales()[0],
              'language' =>country($isocode)->getLanguage(),
              'calling_code' =>country($isocode)->getCallingCode(),
              'region' =>country($isocode)->getRegion(),
              'sub_region' =>country($isocode)->getSubregion(),
              'world_region' =>country($isocode)->getWorldRegion(),

                ]);

        }

         return $response;
    }
}
