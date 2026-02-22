<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Events\TicketCreated;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'title' => $request->title,
            'status' => 'pending'
        ]);

        event(new TicketCreated($ticket));

        return back();
    }
}
