<?php

namespace App\Http\Controllers;

use App\Models\JenisAset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisAsetController extends Controller
{
    public function index()
    {
        $jensiAset = JenisAset::orderBy('name', 'asc')->paginate(10)->withQueryString();

        return view('dataRef.jenisAset.index', compact('jensiAset'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255'
            ]);

            $restored = false;

            DB::transaction(function() use ($validated, &$restored) {
                $jenisaset = JenisAset::withTrashed()
                    ->where('name', $validated['name'])
                    ->first();

                if ($jenisaset && $jenisaset->trashed()) {
                    $jenisaset->restore();
                    $restored = true;
                } elseif (!$jenisaset) {
                    JenisAset::create($validated);
                }
            });

            return redirect()->back()->with(
                'success',
                $restored ? 'Data berhasil direstore.' : 'Data berhasil disimpan.'
            );
    }

    public function update(Request $request, $id)
    {
        $vallidate = $request->validate([
            'name' => 'required|max:255'
        ]);
        
        $jenisaset = JenisAset::where('uuid', $id)->first();

        $jenisaset->update($vallidate);

        return redirect()->back()->with('success', 'Data berhasil diubah.');
    }

    public function destroy($id)
    {
        $jenisaset = JenisAset::where('uuid', $id)->first();

        $jenisaset->delete();
        
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
