<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pendataan Anak Putus Sekolah</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets') }}/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-9 my-2">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Data Diri</h1>
                                    </div>
                                    <form class="user" action="{{ route('jawaban.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="nik"
                                                name="no_induk_kartukeluarga"
                                                placeholder="Masukan Nomor Kartu Keluarga" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama" placeholder="Masukan Nama"
                                                name="nama" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="usia" name="usia" min="10"
                                                max="25" placeholder="Masukan Usia" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="asal_sekolah"
                                                placeholder="Masukan Asal Sekolah" name="asal_sekolah" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nama_ortu"
                                                placeholder="Masukan Nama Orang Tua" name="nama_orangtua" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="desa"
                                                placeholder="Masukan Asal Desa" name="nama_desa" required>
                                        </div>
                                        <div class="form-group row">
                                            <div class="form-group col-lg-6">
                                                <input type="number" class="form-control" id="rt"
                                                    placeholder="Masukan RT" name="rt" required>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <input type="number" class="form-control" id="rw"
                                                    placeholder="Masukan RW" name="rw" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select name="status" id="status" class="form-control" required>
                                                <option selected value="belum lulus smp">Belum Lulus SMP</option>
                                                <option value="lulus smp/paket b">Lulus SMP/Sederajat</option>
                                                {{-- <option value="lulus sma/paket c">Lulus SMA/Sederajat</option> --}}
                                            </select>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($kategori as $judul)
                    <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#collapseCardExample{{ $judul->id }}" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">{{ $judul->judul }}</h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse show" id="collapseCardExample{{ $judul->id }}">
                            <div class="card-body">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($pertanyaan as $quest)
                                <input type="hidden" name="jawaban[{{ $quest->id }}][pertanyaans_id]" value="{{ $quest->id }}">
                                    @if($quest->kategoris_id == $judul->id)
                                        <div class="mb-3">
                                            <label for="quest{{ $quest->id }}"
                                                class="form-label">{{ $quest->pertanyaan }}{{ ($quest->required == 'ya') ? ' (required)' : '' }}</label>
                                            @if($quest->tipe == 'essay')
                                                <textarea class="form-control" id="quest{{ $quest->id }}" rows="4"
                                                    placeholder="Masukan Jawaban" name="jawaban[{{ $quest->id }}][keterangan]" {{ ($quest->required == 'ya') ? 'required' : '' }}></textarea>
                                            @elseif ($quest->tipe == 'pertanyaan singkat')
                                            <input type="text" class="form-control" id="quest{{ $quest->id }}"
                                            name="jawaban[{{ $quest->id }}][keterangan]" placeholder="Masukan Jawaban Singkat" {{ ($quest->required == 'ya') ? 'required' : '' }}>
                                            @else
                                                @foreach($opsi as $pilih)
                                                    @if($pilih->pertanyaans_id == $quest->id)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jawaban[{{ $quest->id }}][opsis_id]"
                                                                id="{{ $pilih->id }}" value="{{ $pilih->id }}" {{ ($quest->required == 'ya') ? 'required' : '' }}>
                                                            <label class="form-check-label"
                                                                for="{{ $pilih->id }}">{{ $pilih->isi }}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                <input type="text" class="form-control" id="quest{{ $quest->id }}"
                                                    name="jawaban[{{ $quest->id }}][keterangan]" placeholder="Masukan Keterangan">
                                                </select>
                                            @endif
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-secondary btn-user btn-block">
                    Kirim
                </button>
                </form>
            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets') }}/js/sb-admin-2.min.js"></script>

</body>

</html>
