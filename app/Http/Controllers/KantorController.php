<?php

namespace App\Http\Controllers;

use App\Http\Requests\KantorRequest;
use Illuminate\Http\Request;
use App\Models\Kantor;
use App\Models\User;
use App\Services\kantor\KantorService;
use Exception;

class KantorController extends Controller
{
    public function index()
    {
        $kantor = Kantor::orderBy('name', 'asc')->get();
        return view('dataRef.kantor.index', compact('kantor'));
    }

    public function store(KantorRequest $request, KantorService $kantorService)
    {
        try {
            $kantorService->create($request->validated());    
            return redirect()->back()->with('success', 'Kantor berhasil dibuat.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan kantor: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('dataRef.kantor.createKantor');
    }

    public function edit($id)
    {        
        $kantor = Kantor::where('uuid', $id)->first();

        return view('dataRef.kantor.editKantor', compact('kantor'));
    }

    public function update(KantorRequest $request, KantorService $kantorService, $id)
    {
        try {
            $kantor = Kantor::where('uuid', $id)->first();
            $kantorService->update($request->validated(), $kantor);
            return redirect()->back()->with('success', 'Kantor berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui kantor: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $kantor = Kantor::where('uuid', $id)->first();

            $cekData = User::where('kantor_id', $kantor->id)->first();
            
            if ($cekData) {
                return redirect()->back()->with('error', 'Tidak dapat menghapus kantor karena masih digunakan oleh user.');
            }   

            $kantor->delete();

            return redirect()->back()->with('success', 'Kantor berhasil dihapus.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus kantor: ' . $e->getMessage());
        }
    }
}
