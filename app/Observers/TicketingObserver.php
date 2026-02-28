<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
            'description' => "Request baru dibuat: {$ticket->request_name}",
        ]);        
    }

     public function updated(Ticket $ticket): void
    {
        ActivityLog::create([
            'user_name' => Auth::user()?->username ?? 'Guest',
            'action'    => 'update',
            'model'     => 'Ticket',
            'model_id'  => $ticket->id,
            'old_data'  => $ticket->getOriginal(),
            'new_data'  => $ticket->getChanges(),
            'description' => "Request diubah: {$ticket->request_name}"
        ]);
    }

    public function saving(Ticket $ticket): void
    {
        $ticket->request_name = Str::title(
            strtolower($ticket->request_name)
        );
    }
}
