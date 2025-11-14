@extends('layouts.app') {{-- ezt cseréld arra, amit a többi oldal is használ --}}

@section('content')

<section id="main" class="wrapper style1">
    <div class="container">
        <header class="major">
            <h2>Beérkezett üzenetek</h2>
            <p>Az űrlapon keresztül beküldött összes üzenet időrendi sorrendben</p>
        </header>

        @if($messages->isEmpty())
            <p>Nincs megjeleníthető üzenet.</p>
        @else
            <div class="table-wrapper">
                <table class="alt">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Név</th>
                            <th>Email</th>
                            <th>Üzenet</th>
                            <th>Küldve</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->name }}</td>
                            <td>{{ $m->email }}</td>
                            <td>{{ $m->message }}</td>
                            <td>{{ $m->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</section>

@endsection
