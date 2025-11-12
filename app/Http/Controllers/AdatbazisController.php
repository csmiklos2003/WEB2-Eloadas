<?php

namespace App\Http\Controllers;

use App\Models\Pilota;
use App\Models\Gp;
use App\Models\Eredmeny;
use Illuminate\Http\Request;

class AdatbazisController extends Controller
{
    protected $connection = 'f1';
    public function index(Request $request)
    {
        // Keresők (opcionális)
        $qPilota = trim($request->get('pilota'));
        $qGp     = trim($request->get('gp'));
        $qCsapat = trim($request->get('csapat'));

        // Pilóták (paginated)
        $pilotak = Pilota::when($qPilota, fn($q) =>
                $q->where('nev', 'like', "%{$qPilota}%")
                  ->orWhere('nemzetiseg', 'like', "%{$qPilota}%")
            )
            ->orderBy('nev')
            ->paginate(10, ['*'], 'pilota_page');

        // GP-k (paginated)
        $gps = Gp::when($qGp, fn($q) =>
                $q->where('nev', 'like', "%{$qGp}%")
                  ->orWhere('orszag', 'like', "%{$qGp}%")
            )
            ->orderBy('datum', 'desc')
            ->paginate(10, ['*'], 'gp_page');

        // Eredmények (eager loading + paginated)
        $eredmenyek = Eredmeny::with(['pilota', 'gp'])
            ->when($qCsapat, fn($q) => $q->where('csapat', 'like', "%{$qCsapat}%"))
            ->orderBy('datum', 'desc')
            ->paginate(10, ['*'], 'eredmeny_page');

        // összesítés a fejlécbe
        $stats = [
            'pilotak' => Pilota::count(),
            'gp'      => Gp::count(),
            'eredm'   => Eredmeny::count(),
        ];

        return view('adatbazis.index', compact('pilotak', 'gps', 'eredmenyek', 'stats', 'qPilota', 'qGp', 'qCsapat'));
    }
}
