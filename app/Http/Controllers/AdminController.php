<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        $items = Item::all();
        $purchases = Purchase::all();
        if(auth()->user()->role == "user"){
            return view('denied');
        }
        return view('admin.index', compact('items', 'purchases'));
    }
}
