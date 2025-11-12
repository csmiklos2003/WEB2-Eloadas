@extends('layouts.app')

@section('title', 'Főoldal - Pilóták Világa')

@section('content')
<!-- Hero szekció -->
<section id="hero" class="wrapper style2 fullscreen fade-up" style="background: linear-gradient(135deg, #f56a6a 0%, #ed4933 100%); color: #fff;">
    <div class="inner" style="max-width: 1000px; margin: 0 auto; text-align: center; padding: 8em 2em;">
        <h1 style="font-size: 3.2em; margin: 0 0 0.4em; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
            Üdvözöljük a Pilóták Világában!
        </h1>
        <p style="font-size: 1.35em; margin: 0 0 2em; opacity: 0.95; line-height: 1.6;">
            Fedezze fel a világ legjobb pilótáinak adatait, statisztikáit és történetét – egy helyen, egyszerűen.
        </p>
        <ul class="actions stacked">
            <li>
                <a href="#features" class="button primary large icon solid fa-plane">
                    Ismerje meg a funkciókat
                </a>
            </li>
        </ul>
    </div>
</section>

<!-- Funkciók összefoglaló -->
<section id="features" class="wrapper style1" style="padding: 6em 0; background: #f8f9fc;">
    <div class="container">
        <header class="major" style="text-align: center; margin-bottom: 3.5em;">
            <h2 style="color: #f56a6a">Mit talál az oldalon?</h2>
            <p style="color: #666; max-width: 800px; margin: 0.8em auto 0; font-size: 1.1em;">
                Minden fontos információ és eszköz egy helyen, hogy könnyen navigálhasson a pilóták világában.
            </p>
        </header>

        <div class="features" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2em;">
            <!-- 1. Pilóták kezelése -->
            <div class="feature" style="background: #fff; padding: 2em; border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.08); text-align: center; transition: transform 0.3s ease;">
                <span class="icon major" style="background: #f56a6a; color: #fff; width: 70px; height: 70px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 1em;">
                    <i class="fa fa-users"></i>
                </span>
                <h3><a href="{{ route('crud.index') }}" style="color: #333; text-decoration: none;">Pilóták kezelése</a></h3>
                <p style="color: #666; line-height: 1.6;">
                    Új pilóta hozzáadása, szerkesztése, törlése. Teljes CRUD funkcionalitás.
                </p>
            </div>

            <div class="feature" style="background: #fff; padding: 2em; border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.08); text-align: center; transition: transform 0.3s ease;">
                <span class="icon major" style="background: #f56a6a; color: #fff; width: 70px; height: 70px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 1em;">
                    <i class="fa fa-users"></i>
                </span>
                <h3><a href="{{ route('adatbazis') }}" style="color: #333; text-decoration: none;">Adatbázis</a></h3>
                <p style="color: #666; line-height: 1.6;">
                    Szűrjön pilótákra, nagydíjakra vagy csapateredményekre.
                </p>
            </div>
           
        </div>
    </div>
</section>

<!-- CTA szekció -->
<section id="cta" class="wrapper style3" style="background: #1a1a1a; color: #fff; padding: 5em 0; text-align: center;">
    <div class="container">
        <h2 style="margin: 0 0 0.6em;">Készen állsz az indulásra?</h2>
        <p style="font-size: 1.15em; opacity: 0.9; max-width: 700px; margin: 0 auto 1.8em;">
            Kezdje el most a pilóták kezelését – kattintson az alábbi gombra!
        </p>
        <a href="{{ route('crud.index') }}" class="button primary large icon solid fa-rocket">
            Ugrás a pilótákhoz
        </a>
    </div>
</section>

<style>
    .button.primary {
        background: #f56a6a !important;
        color: #fff !important;
        transition: all 0.3s ease;
        border: none;
    }

    .button.primary:hover {
        background: #ed4933 !important;
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(245, 106, 106, 0.4);
    }

    .icon.major {
        background: #f56a6a;
    }

    /* Hover effektek a kártyákra */
    .feature:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(245, 106, 106, 0.18) !important;
    }

    .feature h3 a:hover {
        color: #ed4933 !important;
    }

    /* Gombok */
    .button.large {
        padding: 1em 2.2em;
        font-size: 1.1em;
        border-radius: 50px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.2);
    }

    /* Reszponzív */
    @media screen and (max-width: 736px) {
        #hero h1 {
            font-size: 2.4em;
        }
        #hero p {
            font-size: 1.1em;
        }
        #hero .inner {
            padding: 5em 1.5em;
        }
        .features {
            grid-template-columns: 1fr;
        }
    }

    .button .icon + span,
    .button .icon {
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        gap: 0.5em;
    }

    .button.icon.solid::before {
        margin: 0 !important;
        font-size: 1.1em;
    }

    /* Kártyák (feature) tartalmának tökéletes középre igazítása */
    .feature {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        text-align: center;
        padding: 2em;
    }

    .feature .icon.major {
        margin: 0 0 1em 0 !important;
        flex-shrink: 0;
    }

    .feature h3,
    .feature p {
        margin: 0;
        width: 100%;
    }

    /* Nagy gombok (CTA, hero) – ikon és szöveg középre */
    .button.large {
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        gap: 0.75em;
        text-align: center;
        min-height: 50px;
    }

    .button.large .icon {
        font-size: 1.3em;
    }

    /* Kis gombok (pl. pilóták listában) – ha később használod */
    .button.small {
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        gap: 0.4em;
        min-height: 36px;
        padding: 0.5em 0.9em;
    }

    /* Hover állapotoknál is maradjon a középre igazítás */
    .button:hover {
        align-items: center;
        justify-content: center;
    }
</style>
@endsection