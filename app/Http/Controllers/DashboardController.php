<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Ticket::with('department', 'status', 'kpi', 'category', 'user')->orderBy('created_at', 'desc')->paginate(10);
        $statusCount = $data->getCollection()
            ->groupBy(function ($item) {
                return $item->status->id ?? 'Unknown';
            })
            ->map->count();

        $collection = $data->getCollection();

        $totalData = $collection->count(); // total data di page ini

        $statusCount = $collection
            ->groupBy(function ($item) {
                return $item->status->name ?? 'Unknown';
            })
            ->map(function ($items) use ($totalData) {
                $count = $items->count();
                $percentage = $totalData > 0 ? round(($count / $totalData) * 100, 2) : 0;

                return [
                    'count' => $count,
                    'percentage' => $percentage
                ];
            });

        // dd($statusCount['Queue']['count']);
        return view('dashboard', compact('data', 'statusCount'));
    }
}