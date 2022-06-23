<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\SessionInformationController;

class RegistrationController extends Controller
{
    public function create()
    {
        $nextUserId = User::max('user_id') + 1;
        return view('registration.create', compact('nextUserId'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'user_id' => 'required|numeric|unique:users,user_id',
            'name' => 'required',
            'phone' => 'required|numeric|unique:Users,phone',
            'email' => 'email|unique:Users,email',
            'password' => 'required'
        ], [
            'user_id.required' => 'ইউজার আই.ডি. সঠিক ভাবে প্রদান করুন।',
            'user_id.numeric' => 'ইউজার আই.ডি. শুধুমাত্র সংখ্যা হতে পারবে।',
            'user_id.unique' => 'একই ইউজার আই.ডি. ইতিমধ্যে রয়েছে।',
            'name.required' => 'নাম সঠিক ভাবে প্রদান করুন।',
            'phone.required' => 'ফোন নম্বর সঠিক ভাবে প্রদান করুন।',
            'phone.unique' => 'একই ফোন নম্বর ইতিমধ্যে রয়েছে।',
            'phone.numeric' => 'ফোন নম্বর শুধুমাত্র সংখ্যা হতে পারবে।',
            'email.required' => 'ই-মেইল এড্রেস সঠিক ভাবে প্রদান করুন।',
            'email.unique' => 'একই ই-মেইল এড্রেস ইতিমধ্যে রয়েছে।',
            'password.required' => 'পাসওয়ার্ড সঠিক ভাবে প্রদান করুন।',
        ]);

        $user = User::registerUser($request);

        auth()->login($user);

        SessionInformationController::store($user->id, $request->ip(), 'Registered');

        return redirect()->to('/dashboard')->with(['message' => 'আপনি সফল ভাবে নিবন্ধিত হয়েছেন।']);
    }
}