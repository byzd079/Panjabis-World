<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){

        $items = Item::all();
        if(auth()->user()->role == "admin"){
            return view('denied');
        }
        return view('user.index', compact('items'));
    }
}
