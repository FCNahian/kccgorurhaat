<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostInfo extends Model
{
    use HasFactory;

    public static function updateCostInfo($request, $costinfo)
    {
        if ($request->amount) {
            $costinfo->amount = $request->amount;
        }

        $costinfo->save();

        return $costinfo;
    }
}