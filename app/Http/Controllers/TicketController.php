<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTicketingRequest;
use App\Http\Requests\EditTicketingRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Kpi;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Status;
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

    public function edit($tiket)
    {
        
        $data = Ticket::where('uuid', $tiket)->with('department', 'status', 'kpi', 'category', 'user')->firstOrFail();

        $user = User::with('department')->first();

        $categories = Category::orderBy('task_name', 'asc')->get();

        $kpis = Kpi::orderBy('name', 'asc')->get();

        $departments  = Department::orderBy('name', 'asc')->get();
    
        return view('dataMaster.requestTicketing.editRequest', compact('data', 'user', 'categories', 'kpis', 'departments'));
    }

    public function update($tiket, EditTicketingRequest $editTicketingRequest, TicketService $ticketService)
    {
        $ticketService->update($tiket, $editTicketingRequest->validated());

        return redirect()->route('ticketing.index')->with('success', 'Request berhasil diperbarui.');
    }

    public function status($status)
    {
        $ticket = Ticket::with('status')->firstWhere('uuid', $status);   
        
        $status = Status::orderBy('name', 'asc')->get();

        return view('dataMaster.requestTicketing.updateStatus', compact('ticket', 'status'));
    }

    public function updateStatus($id, TicketService $ticketService)
    {
        $request = request()->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);

        $ticketService->updateStatus($id, $request);

        return redirect()->route('dashboard')->with('success', 'Status berhasil diperbarui.');
    }
}
