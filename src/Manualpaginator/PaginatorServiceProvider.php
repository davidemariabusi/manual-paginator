<?php

namespace Dmb\Manualpaginator;

use Illuminate\Support\ServiceProvider;

class PaginatorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Paginator::class, function () {
            return new Paginator();
        });
    }
}
