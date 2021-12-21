<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageCardController extends Controller
{
    public function index()
    {
        $setting = Setting::all();

        return view('admin.setting.page-card.index', compact('setting'));
    }
    public function update(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $keywords = $request->input('keywords');

        $titleSetting = Setting::where('name', 'title')->first();
        $titleSetting->value = $title;
        $titleSetting->save();

        $descriptionSetting = Setting::where('name', 'description')->first();
        $descriptionSetting->value = $description;
        $descriptionSetting->save();

        $keywordsSetting = Setting::where('name', 'keywords')->first();
        $keywordsSetting->value = $keywords;
        $keywordsSetting->save();

        return redirect()
            ->route('admin.setting.page-card.index')
            ->with(['success' => 'Данные обновлены']);

    }
}
