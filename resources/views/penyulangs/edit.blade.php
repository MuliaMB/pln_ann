@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Edit Penyulang</h2>

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

    <form action="{{ route('penyulangs.update', $penyulang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>ID Trafo Daya:</label>
            <input type="number" name="id_trafo_daya" value="{{ $penyulang->id_trafo_daya }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ $penyulang->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Setting Rele:</label>
            <input type="number" name="setting_rele" value="{{ $penyulang->setting_rele }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('penyulangs.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

