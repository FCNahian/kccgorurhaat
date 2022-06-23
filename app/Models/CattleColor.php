<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CattleColor extends Model
{
    use HasFactory;

    public static function registerCattleColor($request)
    {
        $cattlecolor = new CattleColor;

        $cattlecolor->name = $request->name;

        $cattlecolor->addedby_user_id = Auth::user()->user_id;

        $cattlecolor->save();

        return $cattlecolor;
    }

    public static function updateCattleColor($request, $cattlecolor)
    {
        if ($request->name) {
            $cattlecolor->name = $request->name;
        }

        $cattlecolor->updatedby_user_id = Auth::user()->user_id;

        $cattlecolor->save();

        return $cattlecolor;
    }
}