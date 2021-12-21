<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\PageCreateRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.site.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.site.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageCreateRequest $request)
    {
        $data = $request->all();
        $item = Page::create($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('admin.site.pages.edit', $item->id)
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
        $page = Page::findOrFail($id);
        return view('admin.site.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, $id)
    {
        $item = Page::findOrFail($id);
        $data = $request->all();

        $item->fill($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('admin.site.pages.edit', $item->id)
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
        $result = Page::destroy($id);

        if ($result) {
            return redirect()
                ->route('admin.site.pages.index')
                ->with(['success' => "Страница id[$id] удалена"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка удаления'])
                ->withInput();
        }
    }

    public function uploadFileEditor(Request $request)
    {
        if(isset($_FILES['upload']['name']))
        {
            $file= $_FILES['upload']['name'];
            $filetmp = $_FILES['upload']['tmp_name'];

            //move_uploaded_file($filetmp,'upload/'.$file);
            $function_number = $_GET['CKEditorFuncNum'];

            $url = $this->saveMedia('upload');
            $message='';
            echo "<script>window.parent.CKEDITOR.tools.callFunction('".$function_number."','".$url."','".$message."');</script>";
        }
    }
}
