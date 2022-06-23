<?php

namespace App\Http\Controllers;

use App\Models\CostInfo;
use Illuminate\Http\Request;

class CostInfoController extends Controller
{
    public function index()
    {
        $costinfos = CostInfo::all();

        return view('costinfo.index', compact('costinfos'));
    }

    public function update(Request $request, $id)
    {
        $costinfo = CostInfo::find($id);

        $this->validate(request(), [
            'amount' => 'required|numeric',
        ], [
            'amount.required' => 'পরিমান সঠিক ভাবে প্রদান করুন।',
            'amount.numeric' => 'সঠিক ভাবে সংখ্যা লিখুন।'
        ]);

        $costinfo = CostInfo::updateCostInfo($request, $costinfo);

        return redirect()->to('/costinfo')->with(['message' => 'মূল্যের বিবরণী সঠিক ভাবে পরিবর্তিত হয়েছে।']);
    }
}