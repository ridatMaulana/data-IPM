@extends('admin.header')
@section('title',"Kelola Responden")
@section('content')
<section>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Responden</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2 class="mb-4 text-center">Form Responden</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('responden.update',$responden->id) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="mb-3">
                        <label for="inputSubject" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option disabled>-- SILAHKAN PILIH Status --</option>
                            <option {{ ($responden->status == "belum lulus smp") ? 'selected' : '' }} value="belum lulus smp">Belum Lulus SMP</option>
                            <option {{ ($responden->status == "lulus smp/paket b") ? 'selected' : '' }} value="lulus smp/paket b">Lulus SMP/Sederajat</option>
                            <option {{ ($responden->status == "lulus sma/paket c") ? 'selected' : '' }} value="lulus sma/paket c">Lulus SMA/Sederajat</option>
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
