<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Auth;
use App\chuyenmuc;
use App\Hocvien;
use DB;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer('master',function($view){
            $chuyenmuc = chuyenmuc::all();
            $view->with('chuyenmuc',$chuyenmuc);
           
            
        });

    }
}
