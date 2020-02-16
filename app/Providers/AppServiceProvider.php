<?php

namespace App\Providers;
use App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
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
        Validator::extend('alpha_spaces', function ($attribute, $value) {

            // This will only accept alpha and spaces. 
            // If you want to accept hyphens use: /^[\pL\s-]+$/u.
            return preg_match('/^[\pL\s]+$/u', $value); 
    
        });
        Validator::extend('english', function ($attribute, $value) {
            return preg_match('/^[a-zA-Z0-9 .!?"-\/+_)(&*^%$#@~<>\{\}\[\]]*$/u', $value); 
        });

        Validator::extend('arabic', function ($attribute, $value) {
            return preg_match('/^[\p{Arabic}0-9 .!?"-\/+_)(&*^%$#@~<>\{\}\[\]]+$/u', $value); 
        });


        // $locale = app()->getLocale();
        $locale = App::getlocale();
        // dd($locale);
        if($locale == 'en'){
            $dir = 'rtl';
        }else{
            $dir = 'ltr';
        }
        view()->share(compact( 'locale', 'dir'));

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
