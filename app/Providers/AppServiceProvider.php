<?php

namespace App\Providers;

use App\Page;
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
       view()->composer('errors::404', function ($view) 
        {
            $pagex = Page::all()->where('id', '=', 1)->toArray();
            $view->with('pages', $pagex[0]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
        $this->app->bind('path.public', function() {
          return base_path().'/public_html';
        });
    }
}
