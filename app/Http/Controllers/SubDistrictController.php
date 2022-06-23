<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubDistrictController extends Controller
{
    public function index()
    {
        $subdistricts = SubDistrict::all();

        return view('subdistrict.index', compact('subdistricts'));
    }

    public function create()
    {
        $districts = District::all();

        return view('subdistrict.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:sub_districts,name',
            'district_id' => 'required',
        ], [
            'name.required' => 'উপজেলার নাম সঠিক ভাবে প্রদান করুন।',
            'name.unique' => 'একই উপজেলার নাম ইতিমধ্যে রয়েছে।',
            'district_id.required' => 'উপজেলাকে জেলার অধিভুক্ত করুন।'
        ]);

        $subdistrict = SubDistrict::registerSubDistrict($request);

        return redirect()->to('/subdistrict')->with(['message' => 'উপজেলার নাম সঠিক ভাবে যুক্ত হয়েছে।']);
    }

    public function show($id)
    {
        $subdistrict = SubDistrict::find($id);

        return view('subdistrict.show', compact('subdistrict'));
    }

    public function edit($id)
    {
        $districts = District::all();

        $subdistrict = SubDistrict::find($id);

        return view('subdistrict.edit', compact('subdistrict', 'districts'));
    }

    public function update(Request $request, $id)
    {
        $subdistrict = SubDistrict::find($id);

        $this->validate(request(), [
            'name' => [
                'required',
                Rule::unique('sub_districts')->ignore($subdistrict->id, 'id')
            ],
        ], [
            'name.required' => 'উপজেলার নাম সঠিক ভাবে প্রদান করুন।',
            'name.unique' => 'একই উপজেলার নাম ইতিমধ্যে রয়েছে।',
            'district_id.required' => 'উপজেলাকে জেলার অধিভুক্ত করুন।'
        ]);

        $subdistrict = SubDistrict::updateSubDistrict($request, $subdistrict);

        return redirect()->to('/subdistrict/' . $id)->with(['message' => 'উপজেলার নাম সঠিক ভাবে পরিবর্তিত হয়েছে।']);
    }

    public function destroy($id)
    {
        $subdistrict = SubDistrict::find($id);

        $subdistrict->delete();

        return redirect()->to('/subdistrict')->with(['message' => 'উপজেলার নাম মুছে ফেলা হয়েছে।']);
    }

    public function getSubDistrict()
    {
        $subdistricts = SubDistrict::all();

        return response()->json($subdistricts);
    }

    public function getSubDistrictSingle($id)
    {
        $subdistricts = SubDistrict::where('district_id', '=', $id)->get();

        return response()->json($subdistricts);
    }
}