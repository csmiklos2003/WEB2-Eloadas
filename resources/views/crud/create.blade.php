@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Új pilóta felvétele</h2>

    <form action="{{ route('crud.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nev" class="form-label">Név</label>
            <input type="text" name="nev" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nem" class="form-label">Nem</label>
            <select name="nem" class="form-control" required>
                <option value="F">Férfi</option>
                <option value="N">Nő</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="szuletett" class="form-label">Született</label>
            <input type="date" name="szuletett" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nemzetiseg" class="form-label">Nemzetiség</label>
            <input type="text" name="nemzetiseg" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Mentés</button>
        <a href="{{ route('crud.index') }}" class="btn btn-secondary">Vissza</a>
    </form>
</div>
@endsection
