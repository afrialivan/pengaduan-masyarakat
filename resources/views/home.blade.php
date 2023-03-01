<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://kit.fontawesome.com/c404e6b6cb.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/homeButton.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Home</title>
</head>

<body>

    @include('partials.navbar')

    <div class="position-absolute" style="z-index: -999">
        <div class="bg-home"></div>
        <div class="custom-shape-divider-top-1677502627">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path d="M649.97 0L599.91 54.12 550.03 0 0 0 0 120 1200 120 1200 0 649.97 0z" class="shape-fill"></path>
            </svg>
        </div>
    </div>


    <div class="container">

        <div class="row align-items-center landing-page">
            <div class="col-lg-6 header-text">
                <p class="h1 fw-bold text-light header-text">Layanan Aspirasi dan Pengaduan Online Rakyat</p>
                <p class="fs-4 text-light header-text">Sampaikan laporan Anda kapan saja dan dimana saja</p>
                <form action="/login">
                    <button class="cssbuttons-io-button"> Get started
                        <div class="icon">
                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </button>
                </form>
            </div>
            <div class="col-lg-6">
                <img src="img/home.svg" style="width: 500px;" class="d-lg-block d-none m-auto" alt="">
            </div>
        </div>

        <p class="h1 fw-bold about text-center mb-5" data-aos="zoom-in">Petunjuk <span class="text">Malapor</span></p>
        <div data-aos="zoom-in" class="petunjuk d-flex justify-content-center align-items-start flex-wrap"
            style="gap: 30px">

            <div class="instruction d-flex flex-column align-items-center">
                <div class="rounded-circle p-1 shadow bg d-flex justify-content-center align-items-center">
                    <lord-icon src="https://cdn.lordicon.com/nocovwne.json" trigger="hover"
                        colors="primary:#ffffff,secondary:#e4e4e4" style="width:70px;height:70px">
                    </lord-icon>
                </div>
                <p class="fs-5 text-center" style="width: 150px;">User mengisi pengaduan</p>
            </div>
            <div class="arrow align-self-center d-lg-block d-none">
                <i class="fa-solid fa-arrow-right"></i>
            </div>
            <div class="instruction d-flex flex-column align-items-center">
                <div class="rounded-circle p-1 shadow bg d-flex justify-content-center align-items-center">
                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/kbtmbyzy.json" trigger="hover"
                        colors="primary:#ffffff,secondary:#e4e4e4" style="width:250px;height:250px">
                    </lord-icon>
                </div>
                <p class="fs-5 text-center" style="width: 150px;">Menunggu tanggapan dari petugas</p>
            </div>
            <div class="arrow align-self-center d-lg-block d-none">
                <i class="fa-solid fa-arrow-right"></i>
            </div>
            <div class="instruction d-flex flex-column align-items-center">
                <div class="rounded-circle p-1 shadow bg d-flex justify-content-center align-items-center">
                    <lord-icon src="https://cdn.lordicon.com/puvaffet.json" trigger="hover"
                        colors="primary:#ffffff,secondary:#e4e4e4" style="width:250px;height:250px">
                    </lord-icon>
                </div>
                <p class="fs-5 text-center" style="width: 150px;">Petugas memberikan tanggapan</p>
            </div>
            <div class="arrow align-self-center d-lg-block d-none">
                <i class="fa-solid fa-arrow-right"></i>
            </div>
            <div class="instruction d-flex flex-column align-items-center">
                <div class="rounded-circle p-1 shadow bg d-flex justify-content-center align-items-center">
                    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/jvihlqtw.json" trigger="hover"
                        colors="primary:#ffffff,secondary:#0008ff" style="width:250px;height:250px">
                    </lord-icon>
                </div>
                <p class="fs-5 text-center" style="width: 150px;">Pengaduan selesai ditanggapi</p>
            </div>
        </div>

        <p data-aos="zoom-in" class="h1 fw-bold mb-3 about text-center">Pengaduan <span class="text">Terbaru</span></p>
        <div data-aos="zoom-in" class="cards d-flex justify-content-center mt-5 mb-5 flex-wrap" style="gap: 20px">
            @foreach ($pengaduans as $pengaduan)
                <div class="card" style="width: 12rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pengaduan->judul }}</h5>
                        <p class="card-text">{{ $pengaduan->isi_pengaduan }}</p>
                    </div>
                </div>
            @endforeach
        </div>


        <p data-aos="zoom-in" class="h1 fw-bold mb-3 about text-center">About <span class="text">Malapor</span></p>

        <div data-aos="zoom-in-right" class="row align-items-center mb-4">
            <div class="col-lg-5 col-md-5 col-12 mb-4 ">
                <img src="img/malapor.svg" alt="" class="d-block m-auto shadow rounded"
                    style="width: 300px">
            </div>
            <div class="col-lg-7 col-md-7 col-12">
                <p class="fs-5 about-text" style="line-height: 150%"><span class="text">Malapor</span> merupakan
                    sebuah website pengaduan yang dapat membantu anda untuk menyampaikan pengaduan atau aspirasi
                    anda kepada instansi ataupun pihak berwenang</p>
            </div>
        </div>
    </div>

    <footer class="text-center bg-dark text-light py-3 fs-5 mt-3">
        Copyright afrialivan©2023
    </footer>


    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <script src="https://kit.fontawesome.com/c404e6b6cb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="js/home.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
