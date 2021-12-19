<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer(['layouts.app', 'layouts.admin'], function($view) {
            $languages = Language::all();
            $view->with('data', array('languages' => $languages));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
