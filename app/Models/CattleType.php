<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CattleType extends Model
{
    use HasFactory;

    public static function registerCattleType($request)
    {
        $cattletype = new CattleType;

        $cattletype->name = $request->name;

        $cattletype->addedby_user_id = Auth::user()->user_id;

        $cattletype->save();

        return $cattletype;
    }

    public static function updateCattleType($request, $cattletype)
    {
        if ($request->name) {
            $cattletype->name = $request->name;
        }

        $cattletype->updatedby_user_id = Auth::user()->user_id;

        $cattletype->save();

        return $cattletype;
    }
}