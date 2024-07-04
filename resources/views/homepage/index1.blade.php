<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISPAR</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    {{-- <script src="/bootstrap/js/bootstrap.bundle.min.js"></script> --}}


    <link href="/backend/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        /* CSS khusus bisa dimasukkan di sini untuk mempercantik tampilan */
        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover .card-overlay {
            opacity: 1;
        }

        .more-text {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .card:hover .more-text {
            display: block;
        }

        .card-img-container {
            position: relative;
            width: 100%;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-img-container img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-body">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">NTB INDAH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('aboutme') }}">About me</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="#"><strong>{{ Auth::user()->name }}</strong></a>
                        </li>
                    @endauth
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{ route('profil.index') }}">Profil & aktivitas</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                class="dropdown-item" href="#">Logout</a>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>


        </div>
    </nav>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="height: 650px;">
                <img src="/img/Kenawa.jpg" class="d-block w-100 mx-auto" alt="Kenawa Beach">
                <div class="carousel-caption d-none d-md-block">
                    <h5>KENAWA BEACH</h5>
                    <p>Pesona alam dengan pasir putih, air jernih, dan panorama laut yang memukau. Ideal untuk
                        bersantai dan aktivitas air seperti snorkeling dan diving.</p>
                </div>
            </div>
            <div class="carousel-item" style="height: 650px;">
                <img src="/img/Samotajpg.jpg" class="d-block w-100 mx-auto" alt="Kenawa Island">
                <div class="carousel-caption d-none d-md-block">
                    <h5>KENAWA ISLAND</h5>
                    <p>Pesona alam dengan pasir putih, air jernih, dan panorama laut yang memukau. Ideal untuk
                        bersantai dan aktivitas air seperti snorkeling dan diving.</p>
                </div>
            </div>
            <div class="carousel-item" style="height: 650px;">
                <img src="/img/Sekotong.jpg" class="d-block w-100 mx-auto" alt="Sekotong">
                <div class="carousel-caption d-none d-md-block">
                    <h5>SEKOTONG</h5>
                    <p>Pesona alam dengan pasir putih, air jernih, dan panorama laut yang memukau. Ideal untuk
                        bersantai dan aktivitas air seperti snorkeling dan diving.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">
            <!-- Teks yang ingin ditambahkan -->
            <div class="row">
                <div class="col">
                    <h5 class="text-center">
                        Nikmati keindahan alam yang memukau, kekayaan budaya yang beragam, dan keramahan masyarakat yang
                        hangat di destinasi wisata terbaik kami. Dari pantai berpasir putih yang menakjubkan hingga
                        gunung yang menantang, setiap sudut Nusa Tenggara Barat menawarkan pengalaman yang tak
                        terlupakan.
                    </h5>
                </div>
            </div>


            <!-- Akhir dari teks yang ditambahkan -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @forelse ($destinasi_wisata as $row)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-img-container">
                                <img src="/images/{{ $row->image }}" alt="{{ $row->image }}">
                                <div class="card-overlay">
                                    <a href="{{ route('detailwisata.show', ['id' => $row->id]) }}"
                                        class="more-text">More</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>{{ $row->name }}</p>
                                <p>{{ $row->lokasi }}</p>
                                <!-- Deskripsi bisa ditampilkan saat diperlukan -->
                                <!-- <div class="deskripsi" style="display: none;">
                                    <p><strong>DESKRIPSI:</strong> {{ $row->deskripsi }}</p>
                                    <p><strong>Fasilitas:</strong> {{ $row->fasilitas }}</p>
                                    <p><strong>Tiket:</strong> {{ $row->tarif_masuk }}</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="alert alert-danger m-0">
                                Data masih kosong
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    @include('homepage.footer')

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
