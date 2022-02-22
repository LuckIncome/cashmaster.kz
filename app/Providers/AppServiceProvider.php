<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Categories;
use App\Contacts;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer(['partials.header'], function($view)
        {
            $categories = Categories::where('parent_id', null)->where('active', 1)->get();
            $contacts = Contacts::where('is_active', 1)->get();
            $seo = DB::table('seo')->get();
            $view->with(compact('categories', 'contacts', 'seo'));
        });
        view()->composer(['partials.footer'], function($view)
        {
            $categories = Categories::where('parent_id', null)->where('active', 1)->get();
            $contacts = Contacts::where('is_active', 1)->get();
            $view->with(compact('categories', 'contacts'));
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
