<?php

namespace App\Models;

use App\Models\UserRole;
use GuzzleHttp\Psr7\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'password',
        'role_id',
        'active',
        'last_receipt_seriel_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    public function userRole()
    {
        return $this->hasOne(UserRole::class, 'role_id', 'role_id');
    }

    public function SessionInformations()
    {
        return $this->hasMany(SessionInformation::class, 'user_id', 'id');
    }

    public static function registerUser($request)
    {
        $password = Hash::make($request->password);

        $user = new User;

        $user->user_id = $request->user_id;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = $password;
        if ($request->email) {
            $user->email = $request->email;
        }
        if ($request->role_id) {
            $user->role_id = $request->role_id;
        } else {
            $user->active = 1;
        }

        $user->last_receipt_seriel_number = $user->user_id * 10000;
        $user->last_cash_receipt_seriel_number = $user->last_receipt_seriel_number;

        $user->save();

        return $user;
    }

    public static function updateUser($request, $user)
    {
        if ($request->user_id) {
            $user->user_id = $request->user_id;
        }
        if ($request->name) {
            $user->name = $request->name;
        }
        if ($request->phone) {

            $user->phone = $request->phone;
        }
        if ($request->email) {
            $user->email = $request->email;
        }
        if ($request->role_id) {
            $user->role_id = $request->role_id;
        }
        if ($request->active) {
            $user->active = 1;
        }
        if ($request->password) {
            $password = Hash::make($request->password);
            $user->password = $password;
        }

        $user->save();

        return $user;
    }

    public static function updateUserActive($id, $active)
    {
        $user = User::find($id);

        $user->active = $active;

        $user->save();
    }

    public static function checkUserExists($credential)
    {
        if (User::where('phone', '=', $credential)->exists() || User::where('email', '=', $credential)->exists()) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkUserCredentials($credential, $password)
    {
        if (Auth::attempt(['phone' => $credential, 'password' => $password]) || Auth::attempt(['email' => $credential, 'password' => $password])) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkUserActive()
    {
        if (!Auth::user()->active) {
            User::updateUserActive(Auth::user()->id, 1);
            return true;
        } else {

            return false;
        }
    }

    public static function updateUserLastReceiptSerielNumber($id, $seriel_id)
    {
        $user = User::find($id);

        $user->last_receipt_seriel_number = $seriel_id;

        $user->save();

        return $user;
    }

    public static function updateTaxCollectorLastCashReceiptSerielNumber($id, $tax_collection_seriel_end)
    {
        $user = User::where('user_id', '=', $id)->first();

        $user->last_cash_receipt_seriel_number = $tax_collection_seriel_end;

        $user->save();

        return $user;
    }

    public static function updateCashReceiptGeneratorLastReceiptSerialNumber($id, $cash_receipt_seriel_number)
    {
        $user = User::where('user_id', '=', $id)->first();

        $user->last_receipt_seriel_number = $cash_receipt_seriel_number;

        $user->save();

        return $user;
    }
}