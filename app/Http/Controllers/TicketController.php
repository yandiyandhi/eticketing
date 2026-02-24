<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Events\TicketCreated;
use App\Http\Requests\CreateTicketingRequest;
use App\Services\Ticket\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('dataMaster.requestTicketing.indexRequest');
    }

    public function store(CreateTicketingRequest $createTicketingRequest, TicketService $ticketService)    
    {
        $ticketService->store($createTicketingRequest->validated());

        return redirect()->back()->with('success', 'Request berhasil dibuat.');
    }
}
