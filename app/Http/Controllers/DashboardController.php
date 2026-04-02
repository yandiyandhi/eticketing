<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Status;

class DashboardController extends Controller
{
    public function index()
    {
        $search = request('request');

        $status = Status::where('name', 'success')->first();
        // Ambil data ticket dengan relasi
        $datas = Ticket::with('department', 'status', 'kpi', 'category', 'user')
            ->where('status_id', '!=', $status->id)
            ->orderBy('created_at', 'desc');

        if ($search) {
            $datas->where(function ($query) use ($search) {
                $query->where('request_name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('task_name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('department', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    }); 
            });
        }
        $data = $datas->paginate(10)->withQueryString();

        // Ambil collection dari page ini
        $collection = $data->getCollection();

        // Hitung total ticket di page ini
        $totalData = $collection->count();

        // Hitung status count **selain "Success"**
        $statusCount = $collection
            ->filter(function ($item) {
                // Pastikan ada status
                return isset($item->status->name) && strtolower($item->status->name) !== 'success';
            })
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
        $countSuccess = Ticket::where('status_id', $status->id)->count();
        
        return view('dashboard', compact('data', 'statusCount', 'countSuccess'));
    }
}