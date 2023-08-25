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
                <table border="0">
                    @foreach ($rest as $respon)
                    <tr>
                        <td>No Induk Kartu Keluarga</td>
                        <td> : </td>
                        <td>{{ $respon->no_induk_kartukeluarga }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td> : </td>
                        <td>{{ $respon->nama }}</td>
                    </tr>
                    <tr>
                        <td>Usia</td>
                        <td> : </td>
                        <td>{{ $respon->usia }} Tahun</td>
                    </tr>
                    <tr>
                        <td>Asal Sekolah</td>
                        <td> : </td>
                        <td>{{ $respon->asal_sekolah }}</td>
                    </tr>
                    <tr>
                        <td>Nama Orangtua</td>
                        <td> : </td>
                        <td>{{ $respon->nama_orangtua }}</td>
                    </tr>
                    <tr>
                        <td>Asal Desa</td>
                        <td> : </td>
                        <td>{{ $respon->nama_desa }}</td>
                    </tr>
                    <tr>
                        <td>RT/RW</td>
                        <td> : </td>
                        <td>{{ $respon->rt }}/{{ $respon->rw }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td> : </td>
                        <td>{{ $respon->status }}</td>
                    </tr>
                    @endforeach
                </table>
                <div class="table-responsive">
                    <table class="table table-bordered"  width="100%" cellspacing="0">
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
                                $prevCat = null;
                                $count = null;
                            @endphp
                            @foreach($jawaban as $item)
                                <tr>
                                    @if ($item->Pertanyaan->Kategori->judul != "Catatan")
                                        @if($prevCat != $item->Pertanyaan->kategoris_id)
                                            @php
                                            $count = \App\Models\Pertanyaan::where('kategoris_id', $item->Pertanyaan->kategoris_id)->count();
                                            @endphp
                                        <td rowspan="{{ $count }}">{{ $no++ }}</td>
                                        <td rowspan="{{ $count }}">{{ $item->Pertanyaan->Kategori->judul }}</td>
                                        @php $prevCat = $item->Pertanyaan->kategoris_id @endphp
                                        @endif
                                        <td>{{ $item->Pertanyaan->pertanyaan }}</td>
                                        <td>{{ $item->Opsi->isi }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                    @endif
                                    {{-- <td>
                                        <a href="{{ route('responden.edit', $item->id) }}" class="btn btn-warning" title="Ubah Data">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach($jawaban as $item)
                    @if ($item->Pertanyaan->Kategori->judul == "Catatan")
                        <h3>{{ $item->Pertanyaan->Kategori->judul }} : </h3><h5>{{ ($item->Pertanyaan->keterangan != null ) ? $item->Pertanyaan->keterangan : '[Tidak ada catatan]' }}</h5>
                    @endif
                    @endforeach
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
