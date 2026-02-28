<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKpiRequest;
use App\Http\Requests\EditKpiRequest;
use App\Services\Kpi\KpiService;
use Illuminate\Http\Request;
use App\Models\Kpi;
use DomainException;

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

    public function update(EditKpiRequest $editKpiRequest, Kpi $kpi, KpiService $kpiService)
    {        
        $kpiService->udpateKpi($kpi, $editKpiRequest->validated());

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function delete(Kpi $kpi, KpiService $kpiservice)
    {
        try {
            $kpiservice->delete($kpi);

            return redirect()
                ->back()
                ->with('success', 'Kategori berhasil dihapus');
        } catch (DomainException $e) {
            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
