<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $status = Status::orderBy('created_at', 'desc')->get();
        return view('dataRef.status.index', compact('status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        \App\Models\Status::create($request->only('name'));

        return redirect()->route('statuses.index')->with('success', 'Status created successfully.');
    }

    public function update(Request $request, \App\Models\Status $status)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $status->update($request->only('name'));

        return redirect()->route('statuses.index')->with('success', 'Status updated successfully.');
    }

    public function destroy(\App\Models\Status $status)
    {
        $status->delete();

        return redirect()->route('statuses.index')->with('success', 'Status deleted successfully.');
    }
}
