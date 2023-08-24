@extends('admin.header')
@section('title',"Kelola Kategori")
@section('content')
<section>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Kategori</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2 class="mb-4 text-center">Form Kategori</h2>
            </div>
            <div class="card-body">
                <form action="{{ isset($kategori) ? route('kategori.update', $kategori->id) : route('kategori.store') }}" method="POST">
                    @csrf
                    @if(isset($kategori))
                        @method("PATCH")
                    @endif
                    <input type="hidden" name="forms_id" value="99f38a01-11eb-45ba-a8df-4e2f33e3e9c9">
                    <div class="mb-3">
                      <label for="judul" class="form-label">Judul</label>
                      <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Kategori"
                      @if(isset($kategori))
                        value="{{ $kategori->judul }}"
                      @endif>
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
