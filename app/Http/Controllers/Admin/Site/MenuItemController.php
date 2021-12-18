<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Requests\MenuItemCreateRequest;
use App\Http\Requests\MenuItemUpdateRequest;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuItems = MenuItem::all();

        return view('admin.site.menu_items.index', compact('menuItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.site.menu_items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuItemCreateRequest $request)
    {
        $data = $request->all();
        $item = MenuItem::create($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('admin.site.menu-items.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        return view('admin.site.menu_items.edit', compact('menuItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuItemUpdateRequest $request, $id)
    {
        $item = MenuItem::findOrFail($id);
        $data = $request->all();

        $item->fill($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('admin.site.menu-items.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = MenuItem::destroy($id);

        if ($result) {
            return redirect()
                ->route('admin.site.menu-items.index')
                ->with(['success' => "Пункт меню id[$id] удален"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления'])
                ->withInput();
        }
    }
}
