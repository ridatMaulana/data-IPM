@extends('admin.header')
@section('title',"Kelola Pertanyaan")
@section('content')
<section>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Pertanyaan</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2 class="mb-4 text-center">Form Pertanyaan</h2>
            </div>
            <div class="card-body">
                <form
                    action="{{ isset($pertanyaan) ? route('pertanyaan.update', $pertanyaan->id) : route('pertanyaan.store') }}"
                    method="POST">
                    @csrf
                    @if(isset($pertanyaan))
                        @method("PATCH")
                    @endif
                    <div class="mb-3">
                        <label for="pertanyaan" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control" id="pertanyaan" name="pertanyaan"
                            placeholder="Masukan Pertanyaan"  value="{{ isset($pertanyaan) ? $pertanyaan->pertanyaan : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputSubject" class="form-label">Kategori</label>
                        <select class="form-control" id="inputSubject" name="kategoris_id">
                            <option disabled>-- SILAHKAN PILIH KATEGORI --</option>
                            @foreach( $kategori as $item)
                                <option {{ isset($pertanyaan) ? (($pertanyaan->kategoris_id == $item->id) ? 'selected' : '') : '' }} value="{{ $item->id }}">{{ $item->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipe</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipe" id="op" value="opsi" {{ isset($pertanyaan) ? (($pertanyaan->tipe == 'opsi') ? 'checked' : '') : '' }}>
                          <label class="form-check-label" for="maleRadio">Opsi</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="tipe" id="es" value="essay" {{ isset($pertanyaan) ? (($pertanyaan->tipe == 'essay') ? 'checked' : '') : '' }}>
                          <label class="form-check-label" for="femaleRadio">Essay</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="tipe" id="ps" value="jawaban singkat" {{ isset($pertanyaan) ? (($pertanyaan->tipe == 'jawaban singkat') ? 'checked' : '') : '' }}>
                            <label class="form-check-label" for="femaleRadio">Jawaban Singkat</label>
                          </div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Required</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="required" id="yes" value="ya" {{ isset($pertanyaan) ? (($pertanyaan->required == 'ya') ? 'checked' : '') : '' }}>
                          <label class="form-check-label" for="yes">Ya</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="required" id="no" value="tidak" {{ isset($pertanyaan) ? (($pertanyaan->required == 'tidak') ? 'checked' : '') : '' }}>
                          <label class="form-check-label" for="no">Tidak</label>
                        </div>
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
