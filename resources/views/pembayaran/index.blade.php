@extends('layout.be.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Pembayaran</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Booking ID</th>
            <th>User ID</th>
            <th>Jumlah</th>
            <th>Metode Pembayaran</th>
            <th>Tanggal Pembayaran</th>
            <th>Bukti</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pembayarans as $pembayaran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pembayaran->booking_id }}</td>
                <td>{{ $pembayaran->user_id }}</td>
                <td>{{ $pembayaran->jumlah }}</td>
                <td>{{ $pembayaran->metode_pembayaran }}</td>
                <td>{{ $pembayaran->tgl_pembayaran }}</td>
                <td>
                    <img src="{{ asset('storage/' . $pembayaran->bukti) }}" alt="Bukti Pembayaran" style="max-width: 200px;">
                </td>
                <td>
                    {{-- <a class="btn btn-info" href="{{ route('pembayaran.show', $pembayaran->id) }}">Show</a> --}}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
