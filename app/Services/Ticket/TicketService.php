<?php

namespace App\Services\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketService
{
    public function store(array $data): Ticket
    {
        return DB::transaction(function () use ($data) {
            return Ticket::create($data);
        });
    }
}