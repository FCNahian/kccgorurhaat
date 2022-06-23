<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SessionInformationController;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $message = '';

        if (User::checkUserExists($request->credential)) {
            if ($message = User::checkUserCredentials($request->credential, $request->password)) {
                if ($message = User::checkUserActive()) {
                    SessionInformationController::store(Auth::user()->id, $request->ip(), 'Logged In');

                    return redirect()->to('/dashboard')->with(['message' => 'আপনি সফলভাবে সাইন ইন করেছেন।']);
                } else {
                    SessionInformationController::store(Auth::user()->id, $request->ip(), 'Log In Failed');

                    Auth::logout();

                    $message = "এই ব্যাবহারকারী অন্য ডিভাইসে লগড ইন আছেন।";
                }
            } else {
                $message = "আপনি ভুল পাসওয়ার্ড প্রদান করেছেন। অনুগ্রহপূর্বক পুনরায় চেষ্টা করুন।";
            }
        } else {
            $message = "এই ই-মেইল/ফোন নম্বর নিবন্ধিত নয়।";
        }

        return redirect()->back()->with(['message' => $message]);
    }

    public function destroy(Request $request)
    {
        User::updateUserActive(Auth::user()->id, 0);

        SessionInformationController::store(Auth::user()->id, $request->ip(), 'Logged Out');

        auth()->logout();

        return redirect()->to('/')->with(['message' => 'আপনি সফলভাবে সাইন আউট করেছেন।']);
    }
}