<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TicketExport implements FromQuery, WithHeadings, WithMapping
{
    protected $start;
    protected $end;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end   = $end;
    }

    public function query()
    {
        $export = Ticket::with(['department', 'status', 'category', 'user'])
            ->when($this->start && $this->end, function ($q) {
                $q->whereBetween('created_at', [
                    $this->start . ' 00:00:00',
                    $this->end . ' 23:59:59'
                ]);
            })
            ->orderByDesc('created_at');
        dd($export->get());
        return $export;
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
            'Date Approved',
        ];
    }

    public function map($row): array
    {
        return [
            $row->user->name ?? '',
            $row->department->name ?? '',
            $row->description,
            $row->category->task_name ?? '',
            $row->status->name ?? '',
            $row->created_at,
            $row->time_start,
            $row->time_end,
            $row->time_approved,
        ];
    }
}
