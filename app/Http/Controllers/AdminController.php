<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sell;
use App\Users;

class AdminController extends Controller
{
    public function index(){
        $Sell = Sell::join('users', 'users.id', '=', 'sell.user_id')
        ->select('sell.*', 'users.email', 'users.name')
        ->orderBy('sell.id', 'DESC')->get();
        return view('admin', compact('Sell'));
    }

    public function censor($id, $status){
        Sell::where('user_id', $id)->update([
            'status' => $status
        ]);
        return redirect()->route('admin');
    }
}
