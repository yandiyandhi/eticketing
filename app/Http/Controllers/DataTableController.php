<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DataTableController extends Controller
{
    public function DataDept(Request $request)
    {
        return response()->json([
            'data' => Department::select(
                'id',
                'uuid',
                'name',
                'created_at',
                'updated_at'
            )->get()
        ]);
    }
}
