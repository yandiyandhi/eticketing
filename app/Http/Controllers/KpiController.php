<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKpiRequest;
use App\Services\Kpi\KpiService;
use Illuminate\Http\Request;
use App\Models\Kpi;

class KpiController extends Controller
{
    public function index()
    {
        $kpi = Kpi::orderBy('name', 'Asc')->paginate(10);
        return view('dataRef.kpi.index', compact('kpi'));
    }

    public function store(CreateKpiRequest $kpirequest, KpiService $kpiService)
    {
        $kpiService->store($kpirequest->validated());

        return redirect()->back()->with('success', "Data berhasil disimpan");
    }
}
