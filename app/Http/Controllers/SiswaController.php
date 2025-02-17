<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function dashboard() {
        return view('page.Dasboard.sLanding');
    }
}
