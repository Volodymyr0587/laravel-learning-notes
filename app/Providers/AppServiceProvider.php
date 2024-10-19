<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(['layouts.navigation'], function ($view) {
            if (Auth::check()) {
                $notesCount = Auth::user()->notes()->count();
                $trashNotesCount = Auth::user()->notes()->onlyTrashed()->count();
                $resourceTypesCount = Auth::user()->resourceTypes()->count();
                $categoriesCount = Auth::user()->categories()->count();

                $view->with([
                    'notesCount' => $notesCount,
                    'trashNotesCount' => $trashNotesCount,
                    'resourceTypesCount' => $resourceTypesCount,
                    'categoriesCount' => $categoriesCount,

                ]);
            } else {
                // Handle the case where there is no authenticated user (e.g., set it to 0 or skip)
                $view->with([
                    'notesCount' => 0,
                    'trashNotesCount' => 0,
                    'resourceTypesCount' => 0,
                    'categoriesCount' => 0,
                ]);
            }
        });
    }
}
