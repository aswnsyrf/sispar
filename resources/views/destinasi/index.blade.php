{{-- @extends('products.layout') --}}
@extends('layout.be.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>DESTINASI WISATA</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('destinasi.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Destinasi</h2>
        </div>
        {{-- <div class="pull-right">
            <a class="btn btn-primary" href="{{url('dashboard')}}"> Back</a>
        </div> --}}
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Lokasi</th>
            <th>Fasilitas</th>
            <th>Tarif Masuk</th>
            <th>Deskripsi</th>
            <th>Kategori</th>


            <th width="280px">Action</th>
        </tr>
        @foreach ($destinasi_wisatas as $destinasi_wisata)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/images/{{ $destinasi_wisata->image }}" width="100px"></td>
                <td>{{ $destinasi_wisata->name }}</td>
                <td>{{ $destinasi_wisata->lokasi }}</td>
                <td>{{ $destinasi_wisata->fasilitas }}</td>
                <td>{{ $destinasi_wisata->tarif_masuk }}</td>
                <td>{{ $destinasi_wisata->deskripsi }}</td>
                <td>{{ $destinasi_wisata->kategorii?->name }}</td>


                <td>
                    <form action="{{ route('destinasi.destroy', $destinasi_wisata->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('destinasi.show', $destinasi_wisata->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('destinasi.edit', $destinasi_wisata->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
