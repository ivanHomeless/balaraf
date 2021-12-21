<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasswordController extends AdminController
{

    public function edit($id)
    {
        return view('admin.setting.password.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        $password = $request->input('password');
        $user->password = bcrypt($password);
        $user->save();

        if ($user) {
            return redirect()
                ->route('admin.setting.password.edit', 1)
                ->with(['success' => 'Пароль изменен']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

    }

}
