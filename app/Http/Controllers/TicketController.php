<?php

namespace App\Http\Controllers;

use App\Exports\TicketExport;
use App\Http\Requests\CreateTicketingRequest;
use App\Http\Requests\EditTicketingRequest;
use App\Models\Category;
use App\Models\Department;
use App\Models\Kpi;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use App\Services\Ticket\TicketService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TicketController extends Controller
{
    public function index()
    {
        $data = Ticket::with('department', 'status', 'kpi', 'category', 'user')->orderBy('created_at', 'desc')->where('user_id', Auth::id())->paginate(10);

        $user = User::with('department')->first();

        $categories = Category::orderBy('task_name', 'asc')->get();

        $cancel = Status::where('name', 'Cancel')->first();

        $success = Status::where('name', 'Success')->first();

        return view('dataMaster.requestTicketing.indexRequest', compact('data', 'user', 'categories', 'cancel', 'success'));
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

        $kpi = Kpi::orderBy('name', 'asc')->get();

        return view('dataMaster.requestTicketing.updateStatus', compact('ticket', 'status', 'kpi'));
    }

    public function updateStatus($id, TicketService $ticketService)
    {
        $request = request()->validate([
            'status_id' => 'required|exists:statuses,id',
            'kpi_id' => 'required|exists:kpis,id',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $ticketService->updateStatus($id, $request);

        return redirect()->route('dashboard')->with('success', 'Status berhasil diperbarui.');
    }

    public function UserUpdateStatusSuccess($id)
    {
        try {
            $ticket = Ticket::where('uuid', $id)->first();

            if (empty($ticket)) {
                return redirect()->back()->with('error', 'Ticket tidak ditemukan.');
            }

            $status = Status::where('name', 'Success')->first();

            $data = [
                'status_id' => $status->id,
                'time_approved' => now()
            ];

            $ticket->update($data);

            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        } catch (Exception $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat update status : ' . $th->getMessage());
        }
    }

    public function UserUpdateStatusCancel($id)
    {
        try {
            $ticket = Ticket::where('uuid', $id)->first();

            if (empty($ticket)) {
                return redirect()->back()->with('error', 'Ticket tidak ditemukan.');
            }

            $status = Status::where('name', 'Cancel')->first();

            $data = [
                'status_id' => $status->id,
            ];

            $ticket->update($data);

            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        } catch (Exception $th) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat update status : ' . $th->getMessage());
        }
    }



    // Laporan

    public function indexReportsIt()
    {
        $request = request('request');

        $tickets = Ticket::where('status_id', '=', 5)->with('department', 'status', 'kpi', 'category', 'user')->orderBy('created_at', 'desc');

        if ($request) {
            $tickets->where(function ($query) use ($request) {
                $query->Where('description', 'like', "%{$request}%")
                    ->orWhereHas('user', function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request}%");
                    })
                    ->orWhereHas('category', function ($q) use ($request) {
                        $q->where('task_name', 'like', "%{$request}%");
                    })
                    ->orWhereHas('department', function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request}%");
                    });
            });
        }

        $tickets = $tickets->paginate(10)->withQueryString();

        return view('dataMaster.requestTicketing.reports.index', compact('tickets'));
    }


    // Export

    public function exportRequest(Request $request)
    {
        $start = $request->tanggal_awal;
        $end   = $request->tanggal_akhir;
        return Excel::download(new TicketExport($start, $end), 'Request_Ticketing_IT.xlsx');
    }
}
