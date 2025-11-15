<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DiagramController extends Controller
{
    public function index()
    {
        $rows = DB::connection('f1')
            ->table('pilota')
            ->select('nemzetiseg', DB::raw('COUNT(*) as db'))
            ->groupBy('nemzetiseg')
            ->get();

        $labels = $rows->pluck('nemzetiseg');
        $data   = $rows->pluck('db');

        return view('diagram.index', compact('labels', 'data'));
    }
}
