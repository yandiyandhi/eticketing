<?php

namespace App\Http\Controllers;

use App\Services\Dashboard\DashboardService;

class DashboardController extends Controller
{
    public function index(DashboardService $dashboardService)
    {
        $dashboardData = $dashboardService->getDashboardData();

        return view('dashboard', $dashboardData);
    }
}
