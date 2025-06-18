@extends('trafo_dayas.layout')

@section('content')
<div class="container">
    <h2>Tambah Trafo Daya</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trafo_dayas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>ID Gardu Induk:</label>
            <input type="number" name="id_gardu_induk" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kapasitas:</label>
            <input type="text" name="kap" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Setting Rele:</label>
            <input type="text" name="setting_rele" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('trafo_dayas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
