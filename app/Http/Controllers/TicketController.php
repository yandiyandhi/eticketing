<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketingRequest;
use App\Models\Department;
use App\Models\Ticket;
use App\Models\User;
use App\Services\Ticket\TicketService;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $data = Ticket::with('department')->orderBy('created_at', 'desc')->get();

        $user = User::with('department')->first();

        return view('dataMaster.requestTicketing.indexRequest', compact('data', 'user'));
    }

    public function store(CreateTicketingRequest $createTicketingRequest, TicketService $ticketService)
    {
        $ticketService->store($createTicketingRequest->validated());

        return redirect()->back()->with('success', 'Request berhasil dibuat.');
    }
}
