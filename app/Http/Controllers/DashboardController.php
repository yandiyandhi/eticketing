<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Ticket::with('department', 'status', 'kpi', 'category', 'user')->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard', compact('data'));
    }
}
