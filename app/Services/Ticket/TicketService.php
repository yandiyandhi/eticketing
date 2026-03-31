<?php

namespace App\Services\Ticket;

// use App\Events\TicketCreated;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketService
{
    public function store(array $data): Ticket
    {
        return DB::transaction(function () use ($data) {

            return $ticket = Ticket::create($data);

            // event(new TicketCreated(
            //     $ticket->load(['category', 'user', 'status'])
            // ));

            // return $ticket;
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

            $ticket = Ticket::findOrFail($id);

            $ticket->update($data);

            return $ticket;
        });
    }
}
