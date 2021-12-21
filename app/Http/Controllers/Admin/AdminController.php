<?php


namespace App\Http\Controllers\Admin;

use App\Components\UploadedFile;
use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Page;

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
        $pages = Page::take(5)->orderBy('id', 'DESC')->get();
        return view('admin.dashboard', compact('cards', 'pages'));
    }

    protected function saveMedia($type) {

        $dir = '/media' . '/' . $type;
        $path =  public_path() . $dir;
        $file = UploadedFile::getInstance($type);
        if (!$file) {
            return null;
        }
        return '/public/media/' . $type . '/' . $file->saveAs($path);
    }
}
