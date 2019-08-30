<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'reviews'       => 'App\Review',
            'attachments'   => 'App\Attachment',
            'users'         => 'App\User',
            'restaurants'   => 'App\Restaurant',
        ]);
    }
}
