<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketingRequest;
use App\Models\Category;
use App\Models\Kpi;
use App\Models\Ticket;
use App\Models\User;
use App\Services\Ticket\TicketService;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $data = Ticket::with('department', 'status', 'kpi', 'category', 'user')->orderBy('created_at', 'desc')->where('user_id', Auth::id())->paginate(10);

        $user = User::with('department')->first();

        $categories = Category::orderBy('task_name', 'asc')->get();

        $kpis = Kpi::orderBy('name', 'asc')->get();

        return view('dataMaster.requestTicketing.indexRequest', compact('data', 'user', 'categories', 'kpis'));
    }

    public function store(CreateTicketingRequest $createTicketingRequest, TicketService $ticketService)
    {
        $ticketService->store($createTicketingRequest->validated());

        return redirect()->back()->with('success', 'Request berhasil dibuat.');
    }
}
