<?php

namespace App\Services\Dashboard;

use App\Models\Status;
use App\Models\Ticket;

class DashboardService
{
    public function getDataIt()
    {
        $search = request('requestit');

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
            ->whereNotIn('request_to', ['hr'])
            ->when($search, function ($q) use ($search) {
                $q->where(function ($query) use ($search) {
                    $query->Where('description', 'like', "%{$search}%")
                        ->orWhereHas('user', fn($q) => $q->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('category', fn($q) => $q->where('task_name', 'like', "%{$search}%"))
                        ->orWhereHas('department', fn($q) => $q->where('name', 'like', "%{$search}%"));
                });
            })

            ->orderByDesc('created_at')
            ->paginate(10);

        return $query;
    }

    public function getDataHr()
    {
        $search = request('requesthr');

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
            ->whereNotIn('request_to', ['it'])
            ->when($search, function ($q) use ($search) {
                $q->where(function ($query) use ($search) {
                    $query->Where('description', 'like', "%{$search}%")
                        ->orWhereHas('user', fn($q) => $q->where('name', 'like', "%{$search}%"))
                        ->orWhereHas('category', fn($q) => $q->where('task_name', 'like', "%{$search}%"))
                        ->orWhereHas('department', fn($q) => $q->where('name', 'like', "%{$search}%"));
                });
            })

            ->orderByDesc('created_at')
            ->paginate(10);

        return $query;
    }

    public function getStatusCounts()
    {
        $status = Status::orderBy('name', 'desc')->get();

        return $status->map(function ($item) {
            return (object) [
                'name' => $item->name,
                'count' => Ticket::where('status_id', $item->id)->count(),
            ];
        });
    }
}
