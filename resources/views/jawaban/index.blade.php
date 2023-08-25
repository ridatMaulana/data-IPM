@push('style')
    {{-- <link href="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
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
                                <th>{{ $item->pertanyaan }}</th>
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
                                @foreach ($pertanyaan as $item)
                                <th>{{ $item->pertanyaan }}</th>
                                @endforeach
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($respon as $item)
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
                                    @php
                                        $jawaban = \App\Models\Jawaban::where('respondens_id',$item->id)->get();
                                        @endphp
                                    @foreach ($jawaban as $answer)
                                    <td>
                                        {{ ($answer->opsis_id!=null) ? $answer->opsi->isi : '' }}{{ ($answer->keterangan!=null) ? ', '.$answer->keterangan : '' }}
                                    </td>
                                    @endforeach
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
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    {{-- <script src="{{ asset('assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script> --}}

    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('assets') }}/js/demo/datatables-demo.js"></script> --}}
    <script>
        $(document).ready(function () {
            const table = $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf'
                ]
            });
        });
    </script>
@endpush
