@extends('layouts.app') {{-- vagy a te fő layouthoz/passzoló file --}}

@section('content')
<section class="wrapper style1 align-center" style="padding: 2rem;">
  <div class="inner">

    <h2>Adatbázis</h2>
    <p class="major">
      Összesen <strong>{{ number_format($stats['pilotak']) }}</strong> pilóta,
      <strong>{{ number_format($stats['gp']) }}</strong> nagydíj és
      <strong>{{ number_format($stats['eredm']) }}</strong> eredmény.
    </p>

    {{-- Keresők --}}
    <div class="items style1">
      <section>
        <h3>Pilóták keresése</h3>
        <form method="GET" action="{{ route('adatbazis') }}" class="fields">
          <div class="field">
            <input type="text" name="pilota" value="{{ $qPilota }}" placeholder="Név vagy nemzetiség…">
          </div>
          <div class="field">
            <button class="button primary" type="submit">Keresés</button>
          </div>
        </form>
      </section>

      <section>
        <h3>GP keresése</h3>
        <form method="GET" action="{{ route('adatbazis') }}" class="fields">
          <div class="field">
            <input type="text" name="gp" value="{{ $qGp }}" placeholder="GP név vagy ország…">
          </div>
          <div class="field">
            <button class="button primary" type="submit">Keresés</button>
          </div>
        </form>
      </section>

      <section>
        <h3>Eredmények – Csapat szűrés</h3>
        <form method="GET" action="{{ route('adatbazis') }}" class="fields">
          <div class="field">
            <input type="text" name="csapat" value="{{ $qCsapat }}" placeholder="Pl. Scuderia Ferrari">
          </div>
          <div class="field">
            <button class="button primary" type="submit">Keresés</button>
          </div>
        </form>
      </section>
    </div>

    {{-- PILÓTÁK --}}
    <hr />
    <h3>Pilóták</h3>
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Név</th>
            <th>Nem</th>
            <th>Született</th>
            <th>Nemzetiség</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pilotak as $p)
            <tr>
              <td>{{ $p->nev }}</td>
              <td>{{ $p->nem }}</td>
              <td>{{ $p->szuletett }}</td>
              <td>{{ $p->nemzetiseg }}</td>
            </tr>
          @empty
            <tr><td colspan="4">Nincs találat.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    {{ $pilotak->appends(request()->query())->links() }}

    {{-- GP-K --}}
    <hr />
    <h3>Nagydíjak</h3>
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Dátum</th>
            <th>Név</th>
            <th>Ország</th>
          </tr>
        </thead>
        <tbody>
          @forelse($gps as $g)
            <tr>
              <td>{{ $g->datum }}</td>
              <td>{{ $g->nev }}</td>
              <td>{{ $g->orszag }}</td>
            </tr>
          @empty
            <tr><td colspan="3">Nincs találat.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    {{ $gps->appends(request()->query())->links() }}

    {{-- EREDMÉNYEK --}}
    <hr />
    <h3>Eredmények</h3>
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Dátum</th>
            <th>Pilóta</th>
            <th>GP</th>
            <th>Csapat</th>
            <th>Autó</th>
            <th>Motor</th>
            <th>Helyezés</th>
            <th>Hiba</th>
          </tr>
        </thead>
        <tbody>
          @forelse($eredmenyek as $e)
            <tr>
              <td>{{ $e->datum }}</td>
              <td>{{ $e->pilota->nev ?? '—' }}</td>
              <td>{{ $e->gp->nev ?? '—' }}</td>
              <td>{{ $e->csapat }}</td>
              <td>{{ $e->auto }}</td>
              <td>{{ $e->motor }}</td>
              <td>{{ $e->helyezes }}</td>
              <td>{{ $e->hiba }}</td>
            </tr>
          @empty
            <tr><td colspan="8">Nincs találat.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    {{ $eredmenyek->appends(request()->query())->links() }}

  </div>
</section>
@endsection
