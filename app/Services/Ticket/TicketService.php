<?php

namespace App\Services\Ticket;

// use App\Events\TicketCreated;
use App\Models\Ticket;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class TicketService
{
    public function store(array $data): Ticket
    {
        return DB::transaction(function () use ($data) {

            return $ticket = Ticket::create($data);          
        });
    }

    public function update($tiket, array $data): Ticket
    {
        return DB::transaction(function () use ($tiket, $data) {

            $ticket = Ticket::where('uuid', $tiket)->firstOrFail();

            $ticket->update($data);

            return $ticket;
        });
    }

    public function updateStatus($id, array $data): Ticket
    {
        return DB::transaction(function () use ($id, $data) {
            $status = Status::where('id', $data['status_id'])->firstOrFail();

            if($status->name == 'On Progress'){                
                $data['time_start'] = now();
            }elseif ($status->name == 'Done') {
                $data['time_end'] = now();
            }
            
            $ticket = Ticket::findOrFail($id);

            $ticket->update($data);

            return $ticket;
        });
    }
}
