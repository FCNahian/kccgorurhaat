<?php

namespace App\Http\Controllers;

use App\Models\TaxCollection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function analytics()
    {
        $analytcis['totalSalePrice'] = TaxCollection::sum('sale_price');
        $analytcis['totalTaxCollection'] = TaxCollection::sum('total_cost');
        $analytcis['totalCattleSale'] = TaxCollection::all()->last()->id;

        return response()->json($analytcis);
    }
}