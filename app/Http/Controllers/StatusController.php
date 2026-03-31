<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditStatusRequest;
use App\Http\Requests\CreateStatusRequest;
use App\Models\Status;
use App\Services\Status\StatusService;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $status = Status::orderBy('created_at', 'desc')->get();
        return view('dataRef.status.index', compact('status'));
    }

    public function store(CreateStatusRequest $request, StatusService $statusService)
    {        
        $statusService->createStatus($request->validated());                    
        return redirect()->back()->with('success', 'Status created successfully.');
    }

    public function update(EditStatusRequest $request, Status $status, StatusService $statusService)
    {
        $statusService->updateStatus($status, $request->validated());

        return redirect()->route('statuses.index')->with('success', 'Status updated successfully.');
    }

    public function destroy(\App\Models\Status $status)
    {
        $status->delete();

        return redirect()->route('statuses.index')->with('success', 'Status deleted successfully.');
    }
}
