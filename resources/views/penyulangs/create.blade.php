@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Tambah Penyulang</h2>

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

    <form action="{{ route('penyulangs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_trafo_daya" class="form-label">ID Trafo Daya:</label>
            <select name="id_trafo_daya" id="id_trafo_daya" class="form-control" required>
                <option value="">-- Pilih Trafo Daya --</option>
                @foreach($trafos as $trafo)
                <option value="{{ $trafo->id }}">{{ $trafo->id }} - {{ $trafo->nama ?? 'Tanpa Nama' }}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Setting Rele:</label>
            <input type="number" name="setting_rele" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('penyulangs.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection