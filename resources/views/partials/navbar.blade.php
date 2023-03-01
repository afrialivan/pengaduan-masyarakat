<nav class="navbar navbar-expand-lg navbar-light bg-light" style="z-index: 9999; width: 100vw;">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ $title == 'Pengaduan detail' ? '../' : '' }}img/logo.svg" alt="" width="150px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Home' ? 'fw-bold text' : '' }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Pengaduan' ? 'fw-bold text' : '' }}" href="/pengaduan">Pengaduan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'Semua Pengaduan' ? 'fw-bold text' : '' }}" href="/semuapengaduan">Semua Pengaduan</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->nama }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/pengaduansaya">Pengaduan Saya</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ $title == 'Pengaduan detail' ? '../' : '' }}img/profil.png" alt="" class=" rounded-circle"
                                style="width: 40px; height: 40px;"></a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-light" href="/login">Login</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
