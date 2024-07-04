<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISPAR</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        .review-container {
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
    </style>
    <script>
        function setRating(rating) {
            document.getElementById('rating').value = rating;
            for (var i = 1; i <= 5; i++) {
                var star = document.getElementById('star' + i);
                star.style.color = i <= rating ? 'orange' : 'black';
            }
        }

        function submitReview() {
            var today = new Date();
            var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
            var time = today.getHours() + ':' + today.getMinutes() + ':' + today.getSeconds();
            var dateTime = date + ' ' + time;
            document.getElementById('reviewDateTime').value = dateTime;
            document.getElementById('reviewForm').submit();
        }
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">NTB INDAH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profil.index') }}">Profil & aktivitas</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-7">
                <h2>{{ $destinasiWisata->name }}</h2>
                <p class="text-muted">{{ $destinasiWisata->lokasi }}</p>
                <p>{{ $destinasiWisata->deskripsi }}</p>
                <p>Fasilitas {{ $destinasiWisata->fasilitas }}</p>
                <p>Tiket {{ $destinasiWisata->tarif_masuk }}</p>
            </div>
            <div class="col-md-5">
                <img src="/images/{{ $destinasiWisata->image }}" alt="{{ $destinasiWisata->name }}" class="img-fluid">
                <p>
                    Rating:
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= round($destinasiWisata->rating_average))
                            <i class="fas fa-star" style="color: orange;"></i>
                        @else
                            <i class="far fa-star" style="color: orange;"></i>
                        @endif
                    @endfor
                    ({{ number_format($destinasiWisata->rating_average, 1) }})
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <h5>Ulasan</h5>
        @if ($reviews->isEmpty())
            <p>Belum ada ulasan untuk destinasi wisata ini.</p>
        @else
            @foreach ($reviews as $review)
                <div class="review-container">
                    <p><strong>{{ $review->user->name }}</strong></p>
                    <p>Rating:
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $review->rating)
                                <i class="fas fa-star" style="color: orange;"></i>
                            @else
                                <i class="far fa-star" style="color: orange;"></i>
                            @endif
                        @endfor
                    </p>
                    <p>Comment: {{ $review->comment }}</p>
                    <p>Review Date: {{ $review->created_at->format('Y-m-d H:i:s') }}</p>
                    <!-- Tampilkan tanggal review -->
                </div>
            @endforeach
        @endif

        <form id="reviewForm" action="{{ route('destinasi-wisata.storeReview', $destinasiWisata->id) }}"
            method="post">
            @csrf
            <div class="form-group">
                <label for="rating">Rating:</label><br>
                @for ($i = 1; $i <= 5; $i++)
                    <i class="far fa-star" onclick="setRating({{ $i }})"
                        style="cursor: pointer; color: black;" id="star{{ $i }}"></i>
                @endfor
                <input type="hidden" name="rating" id="rating" required>
            </div>
            <div class="form-group">
                <label for="comment">Komentar:</label>
                <textarea name="comment" class="form-control" required></textarea>
            </div>
            <input type="hidden" name="reviewDateTime" id="reviewDateTime">
            @auth
                <button type="button" class="btn btn-primary" onclick="submitReview()">Kirim</button>
            @else
                <a href="{{ url('/login') }}" class="btn btn-primary">Kirim</a>
            @endauth
        </form>
    </div>

    {{-- <div class="container my-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3>Pesan Tiket</h3>
        <form action="{{ route('destinasi-wisata.book', $destinasiWisata->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="waktu">Waktu:</label>
                <input type="time" name="waktu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jumlah_tiket">Jumlah Tiket:</label>
                <input type="number" name="jumlah_tiket" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Pesan</button>
            @auth
                @if ($booking && $booking->status === 'diterima')
                    @php
                        $payment = App\Models\Pembayaran::where('booking_id', $booking->id)->first();
                    @endphp
                    @if (!$payment)
                        <a href="{{ route('pembayaran.create', $booking->id) }}" class="btn btn-success">Isi
                            Pembayaran</a>
                    @endif
                @endif
            @endauth
        </form>
    </div> --}}


    <div class="container my-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h3>Pesan Tiket</h3>
        <form action="{{ route('destinasi-wisata.book', $destinasiWisata->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="waktu">Waktu:</label>
                <input type="time" name="waktu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jumlah_tiket">Jumlah Tiket:</label>
                <input type="number" name="jumlah_tiket" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Pesan</button>
            @auth
                @if ($booking && $booking->status === 'diterima')
                    @php
                        $payment = App\Models\Pembayaran::where('booking_id', $booking->id)->first();
                    @endphp
                    @if (!$payment || $payment->status !== 'selesai')
                        <a href="{{ route('pembayaran.create', $booking->id) }}" class="btn btn-success">Isi
                            Pembayaran</a>
                    @endif
                @endif
            @endauth





        </form>
    </div>


    @include('detailwisata.footer')

</body>

</html>
