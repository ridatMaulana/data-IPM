@push('style')
    <link href="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@extends('admin.header')
@section('title',"Jawaban")
@section('content')
<section>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Jawaban</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Jawaban</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Induk Kartu Keluarga</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Asal Sekolah</th>
                                <th>Nama Orang Tua</th>
                                <th>Desa Asal</th>
                                <th>RT/RW</th>
                                <th>Status</th>
                                @foreach ($pertanyaan as $item)
                                <th>{{ $pertanyaan->pertanyaan }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nomor Induk Kartu Keluarga</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Asal Sekolah</th>
                                <th>Nama Orang Tua</th>
                                <th>Desa Asal</th>
                                <th>RT/RW</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                                    <td>{{ $item->usia }} Tahun</td>
                                    <td>{{ $item->asal_sekolah }}</td>
                                    <td>{{ $item->nama_orangtua }}</td>
                                    <td>{{ $item->nama_desa }}</td>
                                    <td>{{ $item->rt }}/{{ $item->rw }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('responden.edit', $item->id) }}" class="btn btn-warning" title="Ubah Status">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('responden.show', $item->id) }}" class="btn btn-info" title="Detail Jawaban">
                                            <i class="fa fa-info"></i>
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
