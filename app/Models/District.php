<?php

namespace App\Models;

use App\Models\SubDistrict;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    public function subDistricts()
    {
        return $this->hasMany(SubDistrict::class, 'district_id', 'id');
    }

    public static function registerDistrict($request)
    {
        $district = new District;

        $district->name = $request->name;

        $district->addedby_user_id = Auth::user()->user_id;

        $district->save();

        return $district;
    }

    public static function updateDistrict($request, $district)
    {
        if ($request->name) {
            $district->name = $request->name;
        }

        $district->updatedby_user_id = Auth::user()->user_id;

        $district->save();

        return $district;
    }
}