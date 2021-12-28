<?php

namespace App\Providers;

use App\Models\AboutUs;
use App\Models\Category;
use App\Models\Portner;
use App\Models\Service;
use App\Models\Slider;
use App\Models\SocialNetwork;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.footer','contact'], function ($view){
            $view->with('contacts', AboutUs::first()->contacts);
            $view->with('categories', Category::all());
            $view->with('socials', SocialNetwork::all());
        });
        View::composer('layouts.header', function ($view){
            $view->with('categories', Category::with('products')->get());
        });

        View::composer(['index','products'], function ($view)
        {
            $view->with('categories', Category::with('products')->get());
            $view->with('partners', Portner::all());
        });

        View::composer('layouts.slider', function ($view)
        {
            $view->with('slider', Slider::all());
        });


    }
}
