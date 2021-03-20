<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sell;

class MarketController extends Controller
{
    public function index(){
        $id = $_SESSION['id'];
        $CheckSell = Sell::where('sell.user_id', $id)
        ->orderBy('sell.id', 'DESC')->first();

        $Sell = Sell::where('sell.user_id', $id)
        ->join('users', 'users.id', '=', 'sell.user_id')
        ->orderBy('sell.id', 'DESC')->get();
        
        return view('market', compact('CheckSell', 'Sell'));
    }

    public function registration(Request $request){
        $id = $_SESSION['id'];
        $CheckSell = Sell::where('sell.user_id', $id)
        ->orderBy('sell.id', 'DESC')->first();
        if(!isset($CheckSell) || (isset($CheckSell) && $CheckSell->status == 2) )
        {
            $sell = new Sell;
            $sell->user_id = $_SESSION['id'];
            $sell->save();
        }
        return redirect()->route('market')->with('thongbao', 'thanhcong');
    }
}
