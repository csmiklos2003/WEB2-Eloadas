@extends('layouts.app')

@section('content')
    <!-- Main Wrapper -->
    <section id="dashboard" class="wrapper style1 special fade-up" style="padding: 4em 0; text-align:center;">
        <div class="container">
            <header class="major">
                <h2>Üdvözlünk, {{ Auth::user()->name }}!</h2>
                <p>Ez a vezérlőpultod – innen elérheted az összes fontos funkciót.</p>
            </header>

            <div class="box alt">
                <div class="row gtr-uniform" style="display:flex; flex-wrap:wrap; justify-content:center; gap:2em;">

                    <!-- Adatbázis menüpont -->
                    <section class="col-4 col-12-medium" style="flex:1 1 250px;">
                        <a href="{{ route('adatbazis') }}" class="button fit primary icon solid fa-database">Adatbázis</a>
                        <p>Megtekintheted a táblákat és az adataidat.</p>
                    </section>

                    <!-- CRUD menü -->
                    <section class="col-4 col-12-medium" style="flex:1 1 250px;">
                        <a href="{{ route('crud.index') }}" class="button fit primary icon solid fa-edit">CRUD menü</a>
                        <p>Pilóták adatainak kezelése (Create, Read, Update, Delete).</p>
                    </section>

                    <!-- Admin menü (csak adminnak) -->
                    @if(Auth::user()->role === 'admin')
                        <section class="col-4 col-12-medium" style="flex:1 1 250px;">
                            <a href="{{ route('admin') }}" class="button fit primary icon solid fa-lock">Admin menü</a>
                            <p>Adminisztrációs funkciók és statisztikák.</p>
                        </section>
                    @endif

                   <section class="col-4 col-12-medium" style="flex:1 1 250px;">
                        <a href="{{ route('diagram') }}" class="button fit primary icon solid fa-edit">CRUD menü</a>
                        <p>Diagram</p>
                    </section>

                    <!-- Profil -->
                    <section class="col-4 col-12-medium" style="flex:1 1 250px;">
                        <a href="{{ route('profile.edit') }}" class="button fit primary icon solid fa-user">Profilom</a>
                        <p>Személyes adatok és beállítások módosítása.</p>
                    </section>

                </div>
            </div>

            <footer class="major" style="margin-top: 3em;">
                <p>Válassz egy menüpontot a fenti lehetőségek közül.</p>
            </footer>
        </div>
    </section>
@endsection
