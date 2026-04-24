<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRMController extends Controller
{
    public function index()
    {
        $countCustomer = DB::connection('sqlsrv')->table('DWSystem.Warehouse')->get();
        // dd($data);
        return view('crm.index');
    }
}
