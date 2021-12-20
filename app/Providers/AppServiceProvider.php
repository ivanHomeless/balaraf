<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\MenuItem;
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

        view()->composer(['layouts.card', 'layouts.admin', 'layouts.page'], function($view) {
            $languages = Language::all();
            $pages = MenuItem::all();
            $view->with('data', array(
                'languages' => $languages,
                'pages' => $pages,
            ));
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
