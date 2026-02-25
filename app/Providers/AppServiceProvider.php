<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Department;
use App\Observers\DepartmentObserver;
use App\Observers\StatusObserver;
use App\Models\Status;
use App\Models\Ticket;
use App\Observers\CategoryObserver;
use App\Observers\TicketingObserver;
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
        Department::observe(DepartmentObserver::class);
        Status::observe(StatusObserver::class);
        Ticket::observe(TicketingObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
