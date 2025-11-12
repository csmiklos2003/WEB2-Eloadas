@extends('layouts.app')

@section('content')
<div class="container" style="padding: 2rem;">
    <h2>CRUD menü – Pilóták</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('crud.create') }}" class="btn btn-primary mb-3">Új pilóta hozzáadása</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Név</th>
                <th>Nem</th>
                <th>Született</th>
                <th>Nemzetiség</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pilotak as $p)
            <tr>
                <td>{{ $p->nev }}</td>
                <td>{{ $p->nem }}</td>
                <td>{{ $p->szuletett }}</td>
                <td>{{ $p->nemzetiseg }}</td>
                <td>
                    <a href="{{ route('crud.edit', $p->id) }}" class="btn btn-warning btn-sm">Szerkesztés</a>
                    <form action="{{ route('crud.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Biztosan törlöd?')">Törlés</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
