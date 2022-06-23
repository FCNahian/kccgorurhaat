<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashCollection extends Model
{
    use HasFactory;

    public function taxCollector()
    {
        return $this->hasOne(User::class, 'user_id', 'tax_collector_user_id');
    }

    public static function registerCashCollection($request)
    {
        $cashcollection = new CashCollection;

        $cashcollection->cash_receipt_seriel_number = auth()->user()->last_receipt_seriel_number + 1;

        $cashcollection->cash_receipt_generator_user_id = auth()->user()->user_id;

        $cashcollection->tax_collector_user_id = $request->tax_collector_user_id;
        $cashcollection->tax_collection_seriel_start = $request->tax_collection_seriel_start;
        $cashcollection->tax_collection_seriel_end = $request->tax_collection_seriel_end;
        $cashcollection->pole_count = $request->pole_count;
        $cashcollection->pole_cost = $request->pole_cost;
        $cashcollection->tax = $request->tax;
        $cashcollection->total_cash = $request->total_cash;

        $cashcollection->cash_collection_receipt_generated = 1;

        $cashcollection->save();

        $cashcollection->tax_collector_user_name = User::where('user_id', '=', $request->tax_collector_user_id)->first()->name;
        $cashcollection->cash_receipt_generator_user_name = auth()->user()->name;

        $cashcollection->cash_collector_user_id = null;
        $cashcollection->cash_collector_user_name = "";

        return $cashcollection;
    }

    public static function completeCashCollection($cash_receipt_seriel_number)
    {
        $collectedcash = CashCollection::where('cash_receipt_seriel_number', '=', $cash_receipt_seriel_number)->first();

        $collectedcash->cash_collector_user_id = auth()->user()->user_id;

        $collectedcash->cash_collection_completed = 1;

        $collectedcash->save();

        $collectedcash->tax_collector_user_name = User::where('user_id', '=', $collectedcash->tax_collector_user_id)->first()->name;
        $collectedcash->cash_receipt_generator_user_name = User::where('user_id', '=', $collectedcash->cash_receipt_generator_user_id)->first()->name;
        $collectedcash->cash_collector_user_name = User::where('user_id', '=', $collectedcash->cash_collector_user_id)->first()->name;

        return $collectedcash;
    }
}