<?php

namespace App\Services\Dashboard;

use App\Models\Ticket;
use App\Models\Status;

class DashboardService
{
    public function getDashboardData()
    {
        $search = request('request');

        // Ambil ID status sekali saja
        $statusIds = Status::whereIn('name', ['success', 'cancel'])
            ->pluck('id', 'name');

        $successId = $statusIds['Success'] ?? null;
        $cancelId = $statusIds['Cancel'] ?? null;

        // Base query (dipakai ulang)
        $query = Ticket::with(['department', 'status', 'kpi', 'category', 'user'])
            ->when($successId && $cancelId, function ($q) use ($successId, $cancelId) {
                $q->whereNotIn('status_id', [$successId, $cancelId]);
            })
            ->when($search, function ($q) use ($search) {
                $q->where(function ($query) use ($search) {
                    $query->where('request_name', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhereHas('user', fn($q) => $q->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('category', fn($q) => $q->where('task_name', 'like', "%{$search}%"))
                        ->orWhereHas('department', fn($q) => $q->where('name', 'like', "%{$search}%"));
                });
            });

        // Pagination
        $data = (clone $query)
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();


        // Hitung status langsung dari database (lebih efisien)
        $statusCount = (clone $query)
            ->selectRaw('status_id, COUNT(*) as count')
            ->groupBy('status_id')
            ->with('status')
            ->get()
            ->mapWithKeys(function ($item) use ($query) {
                $total = (clone $query)->count(); // total semua data (bukan per page)

                return [
                    $item->status->name ?? 'Unknown' => [
                        'count' => $item->count,
                        'percentage' => $total > 0
                            ? round(($item->count / $total) * 100, 2)
                            : 0
                    ]
                ];
            });
    
        return [
            'data' => $data,
            'statusCount' => $statusCount,
            'countSuccess' => Ticket::where('status_id', $successId)->count(),
            'countCancelled' => Ticket::where('status_id', $cancelId)->count(),
        ];
    }
}