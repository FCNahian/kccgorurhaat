<?php

namespace App\Http\Controllers;

use App\Models\CattleColor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CattleColorController extends Controller
{
    public function index()
    {
        $cattlecolors = CattleColor::all();

        return view('cattlecolor.index', compact('cattlecolors'));
    }

    public function create()
    {
        return view('cattlecolor.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:Cattle_colors,name',
        ], [
            'name.required' => 'রং এর নাম প্রদান করুন।',
            'name.unique' => 'একই নামের রং ইতিমধ্যে রয়েছে।'
        ]);

        $cattlecolor = CattleColor::registerCattleColor($request);

        return redirect()->to('/cattlecolor')->with(['message' => 'নতুন রং সফল ভাবে যুক্ত হয়েছে।']);
    }

    public function show($id)
    {
        $cattlecolor = CattleColor::find($id);

        return view('cattlecolor.show', compact('cattlecolor'));
    }

    public function edit($id)
    {
        $cattlecolor = CattleColor::find($id);

        return view('cattlecolor.edit', compact('cattlecolor'));
    }

    public function update(Request $request, $id)
    {
        $cattlecolor = CattleColor::find($id);

        $this->validate(request(), [
            'name' => [
                'required',
                Rule::unique('cattle_colors')->ignore($cattlecolor->id, 'id')
            ],
        ], [
            'name.required' => 'রং এর নাম প্রদান করুন।',
            'name.unique' => 'একই নামের রং ইতিমধ্যে রয়েছে।'
        ]);

        $cattlecolor = CattleColor::updateCattleColor($request, $cattlecolor);

        return redirect()->to('/cattlecolor/' . $id)->with(['message' => 'রং এর নাম সফল ভাবে পরিবর্তিত হয়েছে।']);
    }

    // public function destroy($id)
    // {
    //     $cattlecolor = CattleColor::find($id);

    //     $cattlecolor->delete();

    //     return redirect()->to('/cattlecolor')->with(['message' => 'রং এর নাম মুছে ফেলা হয়েছে।']);
    // }
}