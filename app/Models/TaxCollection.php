<?php

namespace App\Models;

use App\Models\District;
use App\Models\CattleType;
use App\Models\CattleColor;
use App\Models\SubDistrict;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaxCollection extends Model
{
    use HasFactory;

    public static function registerTaxCollection($request)
    {
        $taxcollection = new TaxCollection;

        $taxcollection->seriel_id = Auth::user()->last_receipt_seriel_number + 1;

        $taxcollection->soldby_user_id = Auth::user()->user_id;

        $taxcollection->seller_name = $request->seller_name;
        if ($request->seller_father_name) {
            $taxcollection->seller_father_name = $request->seller_father_name;
        }
        if ($request->seller_village_name) {
            $taxcollection->seller_village = $request->seller_village_name;
        }
        if ($request->seller_district) {
            $taxcollection->seller_district_id = $request->seller_district;
        }
        if ($request->seller_subdistrict) {
            $taxcollection->seller_subdistrict_id = $request->seller_subdistrict;
        }

        $taxcollection->buyer_name = $request->buyer_name;
        if ($request->buyer_father_name) {
            $taxcollection->buyer_father_name = $request->buyer_father_name;
        }
        if ($request->buyer_village_name) {
            $taxcollection->buyer_village = $request->buyer_village_name;
        }
        if ($request->buyer_district) {
            $taxcollection->buyer_district_id = $request->buyer_district;
        }
        if ($request->buyer_subdistrict) {
            $taxcollection->buyer_subdistrict_id = $request->buyer_subdistrict;
        }

        $taxcollection->cattletype_id = $request->cattletype_id;
        if ($request->cattlecolor_id) {
            $taxcollection->cattlecolor_id = $request->cattlecolor_id;
        }

        $taxcollection->sale_price = $request->sale_price;
        $taxcollection->tax_rate = $request->tax_rate;
        $taxcollection->tax = $request->tax;
        $taxcollection->pole_count = $request->pole_count;
        $taxcollection->pole_cost_rate = $request->pole_cost_rate;
        $taxcollection->pole_cost = $request->pole_cost;
        $taxcollection->total_cost = $request->total_cost;

        $taxcollection->save();

        $taxcollection->soldby_name = Auth::user()->name;

        if ($request->seller_district) {
            $taxcollection->seller_district_name = District::find($request->seller_district)->name;
        }
        if ($request->seller_subdistrict) {
            $taxcollection->seller_subdistrict_name = SubDistrict::find($request->seller_subdistrict)->name;
        }

        if ($request->buyer_district) {
            $taxcollection->buyer_district_name = District::find($request->buyer_district)->name;
        }
        if ($request->buyer_subdistrict) {
            $taxcollection->buyer_subdistrict_name = SubDistrict::find($request->buyer_subdistrict)->name;
        }

        $taxcollection->cattletype_name = CattleType::find($request->cattletype_id)->name;
        if ($request->cattlecolor_id) {
            $taxcollection->cattlecolor_name = CattleColor::find($request->cattlecolor_id)->name;
        }

        return $taxcollection;
    }
}