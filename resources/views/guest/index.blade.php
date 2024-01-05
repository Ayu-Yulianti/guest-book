@extends('layouts.app')
@section('content')
<div class="container">
    @include('layouts._flash')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tulis Pesan Kamu Disini</h5>
                </div>
                <div class="card-body">
                    <!-- Formulir -->
                    <form action="{{ route('guest.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="no_telepon" class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control" id="no_telepon" name="no_telepon">
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @foreach($guests as $index => $guest)
            <div class="card mb-2 position-relative">
                <div
                    class="card-header {{ $index % 4 === 0 ? 'bg-primary' : ($index % 4 === 1 ? 'bg-secondary' : ($index % 4 === 2 ? 'bg-success' : 'bg-danger')) }}">
                    <h5 class="card-title" style="color: white">{{ $guest->nama }}</h5>
                    <form action="{{ route('guest.destroy', $guest->id) }}" method="post"
                        class="position-absolute top-0 end-0 m-2">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Apakah Anda Yakin?')">Hapus
                        </button>
                    </form>
                </div>
                <div class="card-body">
                    <!-- Formulir -->
                    <label for="email" class="form-label"><b> Email</b>: {{ $guest->email }}</label><br>
                    <label for="no_telepon" class="form-label"><b> Nomor Telepon</b>: {{ $guest->no_telepon
                        }}</b></label><br>
                    <label for="pesan" class="form-label"><b>Pesan</b></label>: {{ Str::limit($guest->pesan, 100) }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
