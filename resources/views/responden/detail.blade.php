@push('style')
    <link href="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@extends('admin.header')
@section('title',"Responden")
@section('content')
<section>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Responden</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Responden</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tujuan</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tujuan</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban</th>
                                <th>Keterangan</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($responden as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->no_induk_kartukeluarga }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->usia }}</td>
                                    <td>{{ $item->asal_sekolah }}</td>
                                    <td>{{ $item->nama_orangtua }}</td>
                                    <td>{{ $item->nama_desa }}</td>
                                    <td>{{ $item->rt }}/{{ $item->rw }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('responden.edit', $item->id) }}" class="btn btn-warning" title="Ubah Data">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
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
