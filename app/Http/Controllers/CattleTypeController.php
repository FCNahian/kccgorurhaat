<?php

namespace App\Http\Controllers;

use App\Models\CattleType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CattleTypeController extends Controller
{
    public function index()
    {
        $cattletypes = CattleType::all();

        return view('cattletype.index', compact('cattletypes'));
    }

    public function create()
    {
        return view('cattletype.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:Cattle_types,name',
        ], [
            'name.required' => 'পশুর ধরণ প্রদান করুন।',
            'name.unique' => 'একই ধরণের পশু ইতিমধ্যে রয়েছে।'
        ]);

        $cattletype = CattleType::registerCattleType($request);

        return redirect()->to('/cattletype')->with(['message' => 'নতুন পশুর ধরণ সফল ভাবে যুক্ত হয়েছে।']);
    }

    public function show($id)
    {
        $cattletype = CattleType::find($id);

        return view('cattletype.show', compact('cattletype'));
    }

    public function edit($id)
    {
        $cattletype = CattleType::find($id);

        return view('cattletype.edit', compact('cattletype'));
    }

    public function update(Request $request, $id)
    {
        $cattletype = CattleType::find($id);

        $this->validate(request(), [
            'name' => [
                'required',
                Rule::unique('cattle_types')->ignore($cattletype->id, 'id')
            ],
        ], [
            'name.required' => 'পশুর ধরণ প্রদান করুন।',
            'name.unique' => 'একই ধরণের পশু ইতিমধ্যে রয়েছে।'
        ]);

        $cattletype = CattleType::updateCattleType($request, $cattletype);

        return redirect()->to('/cattletype/' . $id)->with(['message' => 'পশুর ধরণ সফল ভাবে পরিবর্তিত হয়েছে।']);
    }

    // public function destroy($id)
    // {
    //     $cattletype = CattleType::find($id);

    //     $cattletype->delete();

    //     return redirect()->to('/cattletype')->with(['message' => 'পশুর ধরণ মুছে ফেলা হয়েছে।']);
    // }
}