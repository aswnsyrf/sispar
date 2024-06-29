@extends('layout.be.template')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body" style="font-size: 30px;">
                <marquee behavior="scroll" direction="left">SELAMAT DATANG </marquee>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{ route('destinasi.index') }}" style="text-decoration: none; color: inherit;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Destinasi Wisata
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalDestinasi }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{ route('booking.index') }}" style="text-decoration: none; color: inherit;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Booking
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBooking }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            @if (auth()->check() && auth()->user()->hak_akses == 'Admin')
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <a href="{{ route('user.index') }}" style="text-decoration: none; color: inherit;">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jumlah Pegelola
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endif

            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{ route('pembayaran.index') }}" style="text-decoration: none; color: inherit;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Pembayaran
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ \App\Models\Pembayaran::count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <a href="{{ route('kategori.index') }}" style="text-decoration: none; color: inherit;">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Kategori
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ \App\Models\Kategori::count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>



        </div>
    </div>
@endsection
