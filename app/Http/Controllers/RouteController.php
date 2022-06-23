<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function home()
    {
        if (auth()->user()) {
            return redirect()->to("/dashboard");
        }
        return view('home');
    }

    public function location()
    {
        $districts = District::all();

        return view('locations.index', compact('districts'));
    }
}