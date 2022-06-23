<?php

namespace App\Models;

use App\Models\District;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDistrict extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public static function registerSubDistrict($request)
    {
        $subdistrict = new SubDistrict;

        $subdistrict->name = $request->name;

        $subdistrict->district_id = $request->district_id;

        $subdistrict->addedby_user_id = Auth::user()->user_id;

        $subdistrict->save();

        return $subdistrict;
    }

    public static function updateSubDistrict($request, $subdistrict)
    {
        $subdistrict->name = $request->name;
        if ($request->district_id) {
            $subdistrict->district_id = $request->district_id;
        }

        $subdistrict->updatedby_user_id = Auth::user()->user_id;

        $subdistrict->save();

        return $subdistrict;
    }
}