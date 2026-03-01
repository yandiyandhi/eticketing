<?php

namespace App\Services\Ticket;

use App\Events\TicketCreated;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketService
{
    public function store(array $data): Ticket
    {
        return DB::transaction(function () use ($data) {

            $ticket = Ticket::create($data);

            // broadcast event setelah insert sukses
            event(new TicketCreated(
                $ticket->load(['category', 'user', 'status'])
            ));

            return $ticket;
        });
    }
}
