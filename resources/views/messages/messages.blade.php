@extends('layouts.app')  {{-- vagy az alap layoutod neve --}}

@section('content')
<div class="container">
    <h1>Üzenetek</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tartalom</th>
                <th>Küldés ideje</th>
            </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $message->content }}</td> {{-- vagy ahogy a meződ neve van --}}
                <td>{{ $message->created_at->format('Y-m-d H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
