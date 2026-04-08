<?php

namespace App\Http\Controllers;

use App\Services\Dashboard\DashboardService;

class DashboardController extends Controller
{
    public function index(DashboardService $dashboardService)
    {
        $datait = $dashboardService->getDataIt();
        $datahr = $dashboardService->getDataHr();
        $status = $dashboardService->getStatusCounts();
        // dd($data);
        return view('dashboard', [
            'datait' => $datait,
            'datahr' => $datahr,
            'status' => $status
        ]);
    }
}
