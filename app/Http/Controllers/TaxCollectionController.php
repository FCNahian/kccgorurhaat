<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CostInfo;
use App\Models\District;
use App\Models\CattleType;
use App\Models\CattleColor;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use App\Models\TaxCollection;
use Illuminate\Support\Facades\Auth;

class TaxCollectionController extends Controller
{
    public function index()
    {
        $userLastReceiptSerielNumber = auth()->user()->last_receipt_seriel_number;
        if ((int)substr("$userLastReceiptSerielNumber", -4, 4) == 9999) {
            return view('taxcollection.user-limit-reached');
        }
        $districts = District::all();

        $subdistricts = SubDistrict::all();

        $cattletypes = CattleType::all();

        $cattlecolors = CattleColor::all();

        $costinfos = CostInfo::all();

        return view('taxcollection.index', compact('districts', 'subdistricts', 'cattletypes', 'cattlecolors', 'costinfos'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'seller_name' => 'required',
            'buyer_name' => 'required',
            'cattletype_id' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'tax_rate' => 'required|numeric',
            'tax' => 'required|numeric',
            'pole_count' => 'required|numeric',
            'pole_cost_rate' => 'required|numeric',
            'pole_cost' => 'required|numeric',
            'total_cost' => 'required|numeric',
        ], [
            'seller_name.required' => 'বিক্রেতার নাম সঠিক ভাবে প্রদান করুন।',
            'buyer_name.required' => 'ক্রেতার নাম সঠিক ভাবে প্রদান করুন।',
            'cattletype_id.required' => 'পশুর ধরণ সঠিক ভাবে প্রদান করুন।',
            'cattletype_id.numeric' => 'পশুর ধরণ সঠিক ভাবে প্রদান করুন।',
            'sale_price.required' => 'বিক্রয় মূল্য সঠিক ভাবে প্রদান করুন।',
            'sale_price.numeric' => 'বিক্রয় মূল্য শুধুমাত্র সংখ্যা হতে পারবে।',
            'tax_rate.required' => 'খাজনার হার সঠিক ভাবে প্রদান করুন।',
            'tax_rate.numeric' => 'খাজনার হার শুধুমাত্র সংখ্যা হতে পারবে।',
            'tax.required' => 'খাজনার পরিমান সঠিক ভাবে প্রদান করুন।',
            'tax.numeric' => 'খাজনার পরিমান শুধুমাত্র সংখ্যা হতে পারবে।',
            'pole_count.required' => 'খুঁটির সংখ্যা সঠিক ভাবে প্রদান করুন।',
            'pole_count.numeric' => 'খুঁটির সংখ্যা শুধুমাত্র সংখ্যা হতে পারবে।',
            'pole_cost_rate.required' => 'প্রতি খুঁটির মূল্য সঠিক ভাবে প্রদান করুন।',
            'pole_cost_rate.numeric' => 'প্রতি খুঁটির মূল্য শুধুমাত্র সংখ্যা হতে পারবে।',
            'pole_cost.required' => 'খুঁটির মূল্য সঠিক ভাবে প্রদান করুন।',
            'pole_cost.numeric' => 'খুঁটির মূল্য শুধুমাত্র সংখ্যা হতে পারবে।',
            'total_cost.required' => 'মোট মূল্য সঠিক ভাবে প্রদান করুন।',
            'total_cost.numeric' => 'মোট মূল্য শুধুমাত্র সংখ্যা হতে পারবে।',
        ]);

        $taxcollection = TaxCollection::registerTaxCollection($request);

        $user = User::updateUserLastReceiptSerielNumber(auth()->user()->id, $taxcollection->seriel_id);

        return response()->json($taxcollection);
        // return response()->json(['success' => 'Tax Collection Successfull']);
        return redirect()->to('/taxcollection')->with(['message' => 'খাজনা আদায়ের তথ্যাবলী সফলভাবে নিবন্ধিত হয়েছে।']);
    }
}