<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();

        return view('district.index', compact('districts'));
    }

    public function create()
    {
        return view('district.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:Districts,name',
        ], [
            'name.required' => 'জেলার নাম সঠিক ভাবে প্রদান করুন।',
            'name.unique' => 'একই জেলার নাম ইতিমধ্যে রয়েছে।'
        ]);

        $district = District::registerDistrict($request);

        return redirect()->to('/district')->with(['message' => 'জেলার নাম সঠিক ভাবে যুক্ত হয়েছে।']);
    }

    public function show($id)
    {
        $district = District::find($id);

        return view('district.show', compact('district'));
    }

    public function edit($id)
    {
        $district = District::find($id);

        return view('district.edit', compact('district'));
    }

    public function update(Request $request, $id)
    {
        $district = District::find($id);

        $this->validate(request(), [
            'name' => [
                'required',
                Rule::unique('districts')->ignore($district->id, 'id')
            ],
        ], [
            'name.required' => 'জেলার নাম সঠিক ভাবে প্রদান করুন।',
            'name.unique' => 'একই জেলার নাম ইতিমধ্যে রয়েছে।'
        ]);

        $district = District::updateDistrict($request, $district);

        return redirect()->to('/district/' . $id)->with(['message' => 'জেলার নাম সঠিক ভাবে পরিবর্তিত হয়েছে।']);
    }

    // public function destroy($id)
    // {
    //     $district = District::find($id);

    //     $district->delete();

    //     return redirect()->to('/district')->with(['message' => 'জেলার নাম মুছে ফেলা হয়েছে।']);
    // }
}