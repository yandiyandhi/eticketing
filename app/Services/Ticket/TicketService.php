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
}
