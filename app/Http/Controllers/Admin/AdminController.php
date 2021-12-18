<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Main admin page
     */
    public function dashboard()
    {
        $cards = Card::take(5)->orderBy('id', 'DESC')->get();
        return view('admin.dashboard', compact('cards'));
    }
}
