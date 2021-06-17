<?php

namespace App\Http\Controllers\Ventes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenteController extends Controller
{
    public function index()
    {
        return view('Pages.Vente.index');
    }
}
