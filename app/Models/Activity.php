<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'ip_address','url','user_name','email','ip',
        'iso_code' ,
        'country' ,
        'city' ,
        'state' ,
        'state_name',
        'postal_code',
        'lat' ,
        'lon' ,
        'timezone',
        'continent' ,
        'currency',
        'default'  ,
        'platform' ,
       'platformversion' ,
       'browser' ,
       'browserversion',
       'robot_name',
       'is_robot',
       'device',
       'country_flag',
        'language_local' ,
        'calling_code' ,
        'region' ,
        'sub_region' ,
        'world_region' ,
        'language',
    ];
}
