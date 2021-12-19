<?php

namespace App\Http\Controllers\Cards;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
    public function index()
    {
        return view('cards.index');
    }
}
