@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Admin felület</h1>
    <p>Üdv, {{ Auth::user()->name }}!</p>
    <p>Itt csak az admin láthatja az adatokat.</p>
</div>
@endsection
