<header id="site-header" style="background:#1a1a1a; color:#fff; position:fixed; top:0; left:0; width:100%; z-index:1000;">
    <div class="container" 
         style="max-width:1200px; margin:0 auto; display:flex; justify-content:space-between; align-items:center; padding:1em 2em; flex-wrap:wrap;">

        <!-- Logo / App name -->
        <h1 style="margin:0; font-size:1.4em;">
            <a href="{{ route('home') }}" style="color:#fff; text-decoration:none;">
                {{ config('app.name', 'WEB2') }}
            </a>
        </h1>

        <!-- Hamburger toggle (mobile) -->
        <div id="menu-toggle" style="display:none; font-size:1.5em; cursor:pointer;">
            <i class="fa fa-bars"></i>
        </div>

        <!-- Navigation links -->
        <nav id="nav-links" style="display:flex; flex-wrap:wrap; gap:1.5em; align-items:center;">
            <a href="{{ route('dashboard') }}" 
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" 
               style="color:#ccc; text-decoration:none;">Dashboard</a>

            <a href="{{ route('contact.show') }}" 
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" 
               style="color:#ccc; text-decoration:none;">Kapcsolat</a>

            <a href="{{ route('adatbazis') }}" 
               class="{{ request()->routeIs('adatbazis.*') ? 'active' : '' }}" 
               style="color:#ccc; text-decoration:none;">Adatbázis</a>

            <a href="{{ route('crud.index') }}" 
               class="{{ request()->routeIs('crud.*') ? 'active' : '' }}" 
               style="color:#ccc; text-decoration:none;">CRUD menü</a>

                
                @auth                
                <a href="{{ route('messages.index') }}" 
               class="{{ request()->routeIs('messages') ? 'active' : '' }}" 
               style="color:#ccc; text-decoration:none;">Üzenetek</a>
               @endauth

               <a href="{{ route('diagram') }}" 
               class="{{ request()->routeIs('diagram') ? 'active' : '' }}" 
               style="color:#ccc; text-decoration:none;">Diagram</a>


            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin') }}" 
                       class="{{ request()->routeIs('admin') ? 'active' : '' }}" 
                       style="color:#ccc; text-decoration:none;">Admin menü</a>
                @endif

                <!-- User dropdown -->
                <div class="dropdown" style="position:relative;">
                    <a href="#" id="user-menu" style="color:#fff; text-decoration:none;">
                        {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul id="dropdown-menu" 
                        style="display:none; position:absolute; top:2em; right:0; background:#222; list-style:none; padding:0.5em 0; margin:0; border-radius:0.3em; min-width:160px;">
                        <li><a href="{{ route('profile.edit') }}" style="display:block; padding:0.5em 1em; color:#ccc; text-decoration:none;">Profil</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                        style="width:100%; background:none; border:none; color:#ccc; text-align:left; padding:0.5em 1em; cursor:pointer;">
                                    Kijelentkezés
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" style="color:#ccc; text-decoration:none;">Bejelentkezés</a>
                <a href="{{ route('register') }}" style="color:#ccc; text-decoration:none;">Regisztráció</a>
            @endauth
        </nav>
    </div>

    <!-- Inline JS for dropdown + responsive toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdown = document.querySelector('.dropdown');
            const userMenu = document.getElementById('user-menu');
            const dropMenu = document.getElementById('dropdown-menu');
            const menuToggle = document.getElementById('menu-toggle');
            const navLinks = document.getElementById('nav-links');

            // User dropdown toggle
            if (dropdown && userMenu) {
                userMenu.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropMenu.style.display = dropMenu.style.display === 'block' ? 'none' : 'block';
                });
                document.addEventListener('click', () => dropMenu.style.display = 'none');
            }

            // Mobile nav toggle
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    navLinks.style.display = (navLinks.style.display === 'flex' || navLinks.style.display === '') 
                        ? 'none' 
                        : 'flex';
                    navLinks.style.flexDirection = 'column';
                    navLinks.style.width = '100%';
                    navLinks.style.background = '#1a1a1a';
                    navLinks.style.padding = '1em 0';
                });
            }
        });
    </script>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</header>

<!-- Spacer so content doesn't hide behind fixed header -->
<div style="height:70px;"></div>

<style>
/* Hover & active effects */
#header a:hover { color:#fff !important; }
#header a.active { border-bottom:2px solid #5e42a6; color:#fff !important; }
/* Dropdown hover */
#dropdown-menu a:hover, #dropdown-menu button:hover {
    background:#333; color:#fff !important;
}
/* Responsive toggle visible only on small screens */
@media (max-width:768px){
    #menu-toggle { display:block; }
    #nav-links { display:none; width:100%; }
}
</style>
