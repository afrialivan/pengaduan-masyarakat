<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    @yield('style')
    <title>{{ $title }} | Malapor</title>
</head>

<body>

    @if ($title != 'Login' && $title != 'Register')
        @include('partials.navbar')
    @endif

    @if ($title !== 'Pengaduan Saya' && $title !== 'Semua Pengaduan')
        <div class="position-absolute top-0" style="z-index: -999">
            <div class="bg-hero"></div>
            <img src="img/bg.svg" alt="" class="img-hero">
        </div>
    @endif

    @if ($title == 'Pengaduan Saya' || $title == 'Semua Pengaduan')
        <div class="bg-animasi position-absolute"></div>
        <div class="bg-animasi position-absolute"></div>
        <div class="bg-animasi position-absolute"></div>
        <div class="bg-animasi position-absolute"></div>
        <div class="bg-animasi position-absolute"></div>
        <div class="bg-animasi position-absolute"></div>
        <div class="bg-animasi position-absolute"></div>
        <div class="bg-animasi position-absolute"></div>
        <div class="bg-animasi position-absolute"></div>
        @if ($title == 'Semua Pengaduan')
            <div class="bg-laporan py-4 bg">
                <p class="h2 text-center text-light">Semua Pengaduan</p>
            </div>
        @endif
        @if ($title == 'Pengaduan Saya')
            <div class="bg-laporan py-4 bg">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="foto-profil">
                        <img src="img/profil.png" alt=""
                            class="rounded-circle img-thumbnail foto d-block m-auto">
                    </div>
                    <p class="h3 text-light">{{ auth()->user()->nama }}</p>
                </div>
                <div class="container">
                    <a style="cursor: pointer" class="btn btn-outline-light w-100 py-1" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ auth()->user()->id }}" data-bs-whatever="@mdo">
                        Edit Profil
                    </a>
                </div>
            </div>
        @endif
    @endif

    <div class="container mt-4">
        @yield('container')
    </div>

    @if ($title != 'Login' && $title != 'Register' && $title != 'Pengaduan detail')
        <footer class="text-center bg-dark text-light py-3 fs-6 mt-5 position-relative" style="width: 100vw; bottom: 0">
            Copyright afrialivan©2023
        </footer>
    @endif

    <script src="{{ $title == 'Pengaduan detail' ? '../' : '' }}js/main.js"></script>

    <script src="https://kit.fontawesome.com/c404e6b6cb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
