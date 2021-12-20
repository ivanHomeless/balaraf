<?php

namespace App\Http\Controllers\Cards;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
    public function index()
    {

        if (!session()->has('lang')) {
            session(['lang' => 'tatar']);
        }
        $lang = session()->get('lang');

        $lang = Language::where('alias', $lang)->first();

        return view('cards.index', $lang, compact('lang'));
    }

    public function changeLanguage($id)
    {
        $lang = Language::findOrFail($id);
        session(['lang' => $lang->alias]);
        return back();
    }
}
