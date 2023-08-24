@extends('admin.header')
@section('title',"Kelola Opsi")
@section('content')
<section>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Opsi</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2 class="mb-4 text-center">Form Opsi</h2>
            </div>
            <div class="card-body">
                <form
                    action="{{ isset($opsi) ? route('opsi.update', $opsi->id) : route('opsi.store') }}"
                    method="POST">
                    @csrf
                    @if(isset($opsi))
                        @method("PATCH")
                    @endif
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Opsi</label>
                        <input type="text" class="form-control" id="isi" name="isi"
                            placeholder="Masukan Opsi"  value="{{ isset($opsi) ? $opsi->isi : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputSubject" class="form-label">Pertanyaan</label>
                        <select class="form-control" id="inputSubject" name="pertanyaans_id">
                            <option disabled>-- SILAHKAN PILIH PERTANYAAN --</option>
                            @foreach( $pertanyaan as $item)
                                <option {{ isset($opsi) ? (($opsi->pertanyaans_id == $item->id) ? 'selected' : '') : '' }} value="{{ $item->id }}">{{ $item->pertanyaan }} | {{ $item->kategori->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="mb-3">
                      <label for="inputEmail" class="form-label">Email</label>
                      <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                      <label for="inputMessage" class="form-label">Message</label>
                      <textarea class="form-control" id="inputMessage" rows="4" placeholder="Enter your message"></textarea>
                    </div> --}}
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>

    </div>
    </div>
</section>
@endsection
