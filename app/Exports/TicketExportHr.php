<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Ticket;
use Carbon\Carbon;

class TicketExportHr implements FromCollection, WithHeadings, WithMapping
{
    protected $start;
    protected $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end   = $end;
    }

    public function collection()
    {
        return Ticket::with(['department', 'status', 'category', 'user'])
            ->where('request_to', 'hr')
            ->when($this->start && $this->end, function ($q) {
                $q->whereBetween('created_at', [
                    $this->start . ' 00:00:00',
                    $this->end . ' 23:59:59'
                ]);
            })
            ->orderByDesc('created_at')
            ->get();
    }

    public function headings(): array
    {
        return [
            'User',
            'Department',
            'Description',
            'Category',
            'Status',
            'Date Request',
            'Date Processed',
            'Date End',
            'Duration',
            'Date Approved',
            'Created At',
            'Updated At',
        ];
    }

    public function map($ticket): array
    {
        // Hitung durasi
        if ($ticket->time_start && $ticket->time_end) {
            $start = Carbon::parse($ticket->time_start);
            $end = Carbon::parse($ticket->time_end);
            $totalSeconds = $start->diffInSeconds($end);

            $days = intdiv($totalSeconds, 86400);
            $hours = intdiv($totalSeconds % 86400, 3600);
            $minutes = intdiv($totalSeconds % 3600, 60);
            $seconds = $totalSeconds % 60;

            $duration = "{$days} hari {$hours} jam {$minutes} menit {$seconds} detik";
        } else {
            $duration = null;
        }

        return [
            $ticket->user->name ?? '',
            $ticket->department->name ?? '',
            $ticket->description,
            $ticket->category->task_name ?? '',
            $ticket->status->name ?? '',
            $ticket->created_at,
            $ticket->time_start,
            $ticket->time_end,
            $duration,
            $ticket->time_approved,
            $ticket->created_at,
            $ticket->updated_at,
        ];
    }
}