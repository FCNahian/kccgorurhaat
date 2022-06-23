<?php

namespace App\Http\Controllers;

use App\Models\CashCollection;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class CashCollectionController extends Controller
{
    public function cashReceiptCreate()
    {
        $collectors = User::where('role_id', '=', 1)->get();

        return view('cashcollection.receipt.create', compact('collectors'));
    }

    public function cashReceiptStore(Request $request)
    {
        $this->validate(request(), [
            'tax_collector_user_id' => 'required|numeric',
            'tax_collection_seriel_start' => 'required|numeric',
            'tax_collection_seriel_end' => 'required|numeric',
            'pole_count' => 'required|numeric',
            'pole_cost' => 'required|numeric',
            'tax' => 'required|numeric',
            'total_cash' => 'required|numeric',
        ], [
            'tax_collector_user_id.required' => 'ট্যাক্স কালেক্টর এর নাম সঠিক ভাবে প্রদান করুন।',
            'tax_collector_user_id.numeric' => 'ট্যাক্স কালেক্টর এর নাম সঠিক ভাবে প্রদান করুন।',
            'tax_collection_seriel_start.required' => 'সর্বশেষ জমাকৃত রিসিট এর সিরিয়াল নম্বর সঠিক ভাবে প্রদান করুন।',
            'tax_collection_seriel_start.numeric' => 'সর্বশেষ জমাকৃত রিসিট এর সিরিয়াল নম্বর শুধুমাত্র সংখ্যা হতে পারবে।',
            'tax_collection_seriel_end.required' => 'সর্বশেষ আদায়কৃত রিসিট এর সিরিয়াল নম্বর সঠিক ভাবে প্রদান করুন।',
            'tax_collection_seriel_end.numeric' => 'সর্বশেষ আদায়কৃত রিসিট এর সিরিয়াল নম্বর শুধুমাত্র সংখ্যা হতে পারবে।',
            'pole_count.required' => 'খুঁটির সংখ্যা সঠিক ভাবে প্রদান করুন।',
            'pole_count.numeric' => 'খুঁটির সংখ্যা শুধুমাত্র সংখ্যা হতে পারবে।',
            'pole_cost.required' => 'খুঁটির মূল্য সঠিক ভাবে প্রদান করুন।',
            'pole_cost.numeric' => 'খুঁটির মূল্য শুধুমাত্র সংখ্যা হতে পারবে।',
            'tax.required' => 'খাজনার পরিমান সঠিক ভাবে প্রদান করুন।',
            'tax.numeric' => 'খাজনার পরিমান শুধুমাত্র সংখ্যা হতে পারবে।',
            'total_cash.required' => 'মোট অর্থ সঠিক ভাবে প্রদান করুন।',
            'total_cash.numeric' => 'মোট অর্থ শুধুমাত্র সংখ্যা হতে পারবে।',
        ]);

        $cashcollection = CashCollection::registerCashCollection($request);

        $taxcollector = User::updateTaxCollectorLastCashReceiptSerielNumber($request->tax_collector_user_id, $request->tax_collection_seriel_end);

        $cashreceiptgenerator = User::updateCashReceiptGeneratorLastReceiptSerialNumber(auth()->user()->user_id, $cashcollection->cash_receipt_seriel_number);

        return response()->json($cashcollection);
    }

    public function receiveCashCreate()
    {
        $uncollectedcashes = CashCollection::where('cash_collection_completed', '=', NULL)->get();

        return view('cashcollection.receivecash.create', compact("uncollectedcashes"));
    }

    public function receiveCashStore(Request $request)
    {
        $this->validate(request(), [
            'cash_receipt_seriel_number' => 'required|numeric',
        ], [
            'cash_receipt_seriel_number.required' => 'ক্যাশ কালেকশন এর তথ্য সঠিক নেই।',
            'cash_receipt_seriel_number.numeric' => 'ক্যাশ কালেকশন এর তথ্য সঠিক নেই।',
        ]);

        $collectedcash = CashCollection::completeCashCollection($request->cash_receipt_seriel_number);

        return response()->json($collectedcash);
    }
}