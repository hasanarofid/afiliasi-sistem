<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Leads;
use App\Models\MyMoney;
use App\Models\ProdukLink;

class DashboardController extends Controller
{
    // render index dashboard
    public function index(){
        $totalproduk = Produk::get()->count();
        $totalproduklink = ProdukLink::get()->count();
        $totalMyMoney = MyMoney::get()->count();
        $totalLeads = Leads::get()->count();

        return view('dashboard.index',compact(
            'totalproduk','totalproduklink',
            'totalMyMoney','totalLeads'
        ));
    }
}
