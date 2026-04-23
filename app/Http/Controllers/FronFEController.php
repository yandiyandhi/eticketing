<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FronFEController extends Controller
{
    public function detail()
    {
        return view('frontfe.detail');
    }
}
