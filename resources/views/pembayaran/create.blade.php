<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISPAR</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">


    <link href="/backend/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>

    {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
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
                            <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                        </li>
                    @endauth
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav> --}}
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

    <br>
    <br>
    <br>
    <div class="d-flex flex-column mb-3 justify-content-center">

        <div class="container marketing">

            <!-- Error Alert -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Payment Creation Form -->
            <h3>Create Pembayaran</h3>
            <form action="{{ route('pembayaran.store', $booking->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="jumlah">Jumlah Pembayaran:</label>
                    <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') }}" required>
                </div>
                <div class="form-group">
                    <label for="metode_pembayaran">Metode Pembayaran:</label>
                    <input type="text" name="metode_pembayaran" class="form-control"
                        value="{{ old('metode_pembayaran') }}" required>
                </div>
                <div class="form-group">
                    <label for="tgl_pembayaran">Tanggal Pembayaran:</label>
                    <input type="date" name="tgl_pembayaran" class="form-control"
                        value="{{ old('tgl_pembayaran') }}" required>
                </div>
                <div class="form-group">
                    <label for="bukti">Upload Bukti Pembayaran:</label>
                    <input type="file" name="bukti" class="form-control-file" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit Pembayaran</button>
            </form>

        </div>
    </div>



    <br>
    <br>
    <br>

    @include('detailwisata.footer')

</body>

</html>
