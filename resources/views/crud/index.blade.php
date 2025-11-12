@extends('layouts.app')

@section('content')
<section id="crud" class="wrapper style1 fade-up" style="padding: 5em 0;">
    <div class="container">

        <!-- Fejléc -->
        <header class="major" style="text-align: center; margin-bottom: 2.5em;">
            <h2>CRUD menü – Pilóták</h2>
            <p>Kezeld a pilóták adatait: új hozzáadás, módosítás, törlés.</p>
        </header>

        <!-- Új pilóta gomb -->
        <div style="text-align: right; margin-bottom: 1.5em;">
            <a href="{{ route('crud.create') }}" class="button primary icon solid fa-plus">
                Új pilóta hozzáadása
            </a>
        </div>

        <!-- Táblázat konténer -->
        <div class="table-wrapper" style="overflow-x: auto;">
            <table class="alt" style="width: 100%; border-collapse: collapse;">
                <thead style="background: #1a1a1a; color: #fff;">
                    <tr>
                        <th style="padding: 0.75em;">Név</th>
                        <th style="padding: 0.75em;">Nem</th>
                        <th style="padding: 0.75em;">Született</th>
                        <th style="padding: 0.75em;">Nemzetiség</th>
                        <th style="padding: 0.75em; text-align:center;">Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pilotak as $pilota)
                        <tr style="background: #f9f9f9; transition: background 0.3s ease;">
                            <td style="padding: 0.75em;">{{ $pilota->nev }}</td>
                            <td style="padding: 0.75em;">{{ $pilota->nem }}</td>
                            <td style="padding: 0.75em;">{{ $pilota->szuletett }}</td>
                            <td style="padding: 0.75em;">{{ $pilota->nemzetiseg }}</td>
                            <td style="padding: 0.75em; text-align:center;">
                                <a href="{{ route('crud.edit', $pilota->id) }}" 
                                   class="button small" 
                                   style="background: #5e42a6; color:#fff; border:none; padding:0.5em 1em; border-radius:6px; text-decoration:none; margin-right:0.5em;">
                                    <i class="fa fa-pen"></i> Szerkesztés
                                </a>

                                <form action="{{ route('crud.destroy', $pilota->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="button small" 
                                            style="background: #d83c3c; color:#fff; border:none; padding:0.5em 1em; border-radius:6px; cursor:pointer;"
                                            onclick="return confirm('Biztosan törölni szeretnéd {{ $pilota->nev }} adatait?');">
                                        <i class="fa fa-trash"></i> Törlés
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($pilotak->isEmpty())
            <p style="text-align:center; margin-top:2em;">Nincs megjeleníthető pilóta.</p>
        @endif

    </div>
</section>

<style>
/* Escape Velocity stílushoz illő táblázat és gombok */
#crud table tr:hover {
    background: #f0ebff !important;
}
.button.primary {
    background: #5e42a6;
    border: none;
    color: #fff !important;
    text-decoration: none;
    transition: background 0.3s ease;
}
.button.primary:hover {
    background: #7a5cd8;
}
.button.small {
    font-size: 0.9em;
}
.table-wrapper {
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    border-radius: 10px;
    overflow: hidden;
}
thead th {
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 0.05em;
}
tbody tr:nth-child(even) {
    background: #f1f1f1;
}
tbody td {
    color: #333;
}
</style>
@endsection
