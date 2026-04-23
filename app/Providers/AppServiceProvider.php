<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Department;
use App\Models\Divisi;
use App\Models\JenisAset;
use App\Models\Kantor;
use App\Models\Kpi;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use App\Observers\CategoryObserver;
use App\Observers\DepartmentObserver;
use App\Observers\DivisiObserver;
use App\Observers\JenisAsetObserver;
use App\Observers\KantorObserver;
use App\Observers\KpiObserver;
use App\Observers\RoleObserver;
use App\Observers\StatusObserver;
use App\Observers\TicketingObserver;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;

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
        User::observe(UserObserver::class);
        Divisi::observe(DivisiObserver::class);
        Kantor::observe(KantorObserver::class);
        JenisAset::observe(JenisAsetObserver::class);
    

        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Admin')) {
                return true;
            }
        });

        if (request()->header(key: 'x-forwarded-proto') === 'https') {
            URL::forceScheme('https');
        }
    }
}
