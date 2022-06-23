<?php

namespace App\Http\Controllers;

use App\Models\TaxCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('user_id', 'asc')->get();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        $nextUserId = User::max('user_id') + 1;
        return view('user.create', compact("nextUserId"));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'user_id' => 'required|numeric|unique:users,user_id',
            'name' => 'required',
            'phone' => 'required|numeric|unique:Users,phone',
            'email' => 'email|unique:Users,email',
            'password' => 'required',
            'role_id' => 'required',
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
            'role_id.required' => 'সঠিক ভাবে পদবি নিযুক্ত করুন।',
        ]);

        $user = User::registerUser($request);

        return redirect()->to('/user')->with(['message' => 'নতুন ব্যাবহারকারী সফলভাবে নিবন্ধিত হয়েছেন।']);
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate(request(), [
            'user_id' => [
                'required',
                'numeric',
                Rule::unique('users')->ignore($user->id, 'id')
            ],
            'phone' => [
                'required',
                'numeric',
                Rule::unique('users')->ignore($user->id, 'id')
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id, 'id')
            ],
        ], [
            'user_id.required' => 'ইউজার আই.ডি. সঠিক ভাবে প্রদান করুন।',
            'user_id.numeric' => 'ইউজার আই.ডি. শুধুমাত্র সংখ্যা হতে পারবে।',
            'user_id.unique' => 'একই ইউজার আই.ডি. ইতিমধ্যে রয়েছে।',
            'phone.required' => 'ফোন নম্বর সঠিক ভাবে প্রদান করুন।',
            'phone.unique' => 'একই ফোন নম্বর ইতিমধ্যে রয়েছে।',
            'phone.numeric' => 'ফোন নম্বর শুধুমাত্র সংখ্যা হতে পারবে।',
            'email.required' => 'ই-মেইল এড্রেস সঠিক ভাবে প্রদান করুন।',
            'email.unique' => 'একই ই-মেইল এড্রেস ইতিমধ্যে রয়েছে।',
        ]);

        $user = User::updateUser($request, $user);

        return redirect()->to('/user/' . $id)->with(['message' => 'ব্যাবহারকারির তথ্য সঠিক ভাবে পরিবর্তিত হয়েছে।']);
    }

    // public function destroy($id)
    // {
    //     $user = User::find($id);

    //     $user->delete();

    //     return redirect()->to('/user')->with(['message' => 'ব্যাবহারকারী এবং তার তথ্যসমূহ মুছে ফেলা হয়েছে।']);
    // }

    public function getTaxCollectorInfo($id)
    {
        $collector = User::where('user_id', '=', $id)->first();

        $collector->pole_count = TaxCollection::where('soldby_user_id', '=', $collector->user_id)->whereBetween('seriel_id', [$collector->last_cash_receipt_seriel_number + 1, $collector->last_receipt_seriel_number])->sum('pole_count');
        $collector->pole_cost = TaxCollection::where('soldby_user_id', '=', $collector->user_id)->whereBetween('seriel_id', [$collector->last_cash_receipt_seriel_number + 1, $collector->last_receipt_seriel_number])->sum('pole_cost');
        $collector->tax = TaxCollection::where('soldby_user_id', '=', $collector->user_id)->whereBetween('seriel_id', [$collector->last_cash_receipt_seriel_number + 1, $collector->last_receipt_seriel_number])->sum('tax');
        $collector->total_cost = TaxCollection::where('soldby_user_id', '=', $collector->user_id)->whereBetween('seriel_id', [$collector->last_cash_receipt_seriel_number + 1, $collector->last_receipt_seriel_number])->sum('total_cost');

        return response()->json($collector);
    }
}