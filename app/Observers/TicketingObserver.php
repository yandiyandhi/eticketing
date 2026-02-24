<?php

namespace App\Observers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use App\Models\ActivityLog;

class TicketingObserver
{
    public function created(Ticket $ticket): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'Ticket',
            'model_id'    => $ticket->id,
            'new_data'    => $ticket->toArray(),
            'description' => "Departemen baru dibuat: {$ticket->name}",
        ]);
    }
}
