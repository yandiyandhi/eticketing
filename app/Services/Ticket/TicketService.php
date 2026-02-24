<?php

namespace App\Services\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketService
{
    public function store(array $data): Ticket
    {
        return DB::transactions(function () use ($data) {
            return Ticket::create($data);
        });
    }
}