@push('style')
    <link href="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@extends('admin.header')
@section('title',"Kelola Pertanyaan")
@section('content')
<section>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Pertanyaan</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pertanyaan</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('pertanyaan.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                    Tambah Data
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Kategori</th>
                                <th>Tipe</th>
                                <th>Required</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Kategori</th>
                                <th>Tipe</th>
                                <th>Required</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($pertanyaan as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->pertanyaan }}</td>
                                    <td>{{ $item->kategori->judul }}</td>
                                    <td>{{ $item->tipe }}</td>
                                    <td>{{ $item->required }}</td>
                                    <td>
                                        <a href="{{ route('pertanyaan.edit', $item->id) }}" class="btn btn-warning" title="Ubah Data">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form style="display: inline" action="{{ route('pertanyaan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" title="Hapus Data" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('tambahan')
    <script src="{{ asset('assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets') }}/js/demo/datatables-demo.js"></script>
@endpush
