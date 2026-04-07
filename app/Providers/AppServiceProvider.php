<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Department;
use App\Models\Kpi;
use App\Observers\DepartmentObserver;
use App\Observers\StatusObserver;
use App\Models\Status;
use App\Models\Ticket;
use App\Observers\CategoryObserver;
use App\Observers\KpiObserver;
use App\Observers\TicketingObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;
use App\Observers\RoleObserver;

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
        Kpi::observe(KpiObserver::class);
        Role::observe(RoleObserver::class);

        if (request()->header(key: 'x-forwarded-proto') === 'https') {
            URL::forceScheme('https');
        }
    }
}
