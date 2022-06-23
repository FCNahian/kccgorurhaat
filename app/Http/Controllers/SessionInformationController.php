<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionInformation;

class SessionInformationController extends Controller
{
    public static function store($id, $ip, $activity)
    {
        $session = new SessionInformation;

        $session->user_id = $id;
        $session->device_ip = $ip;
        $session->activity = $activity;

        $session->save();
    }
}