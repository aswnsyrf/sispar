@extends('layout.be.template')

@section('title', 'Bookings')

@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Booking List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="bookingsTable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Destinasi Wisata</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Jumlah Tiket</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->destinasiWisata->name }}</td>
                                <td>{{ $booking->tanggal }}</td>
                                <td>{{ $booking->waktu }}</td>
                                <td>{{ $booking->jumlah_tiket }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>
                                    <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@stop


@section('js')
    <script>
        $(document).ready(function() {
            $('#bookingsTable').DataTable();
        });
    </script>
@stop
