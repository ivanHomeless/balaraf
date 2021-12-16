<?php


namespace App\Http\Controllers\Admin;




class AdminController extends BaseController
{
    /**
     * Main admin page
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
