<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\JsonResource;
use Inertia\Inertia;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        Inertia::share([
            'locale' => function () {
                return app()->getLocale();
            },
            'translation' => function () {
                return json_decode(file_get_contents(resource_path('lang/'. app()->getLocale() .'.json')), true);
            }
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();
    }
}
