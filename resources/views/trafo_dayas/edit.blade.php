@extends('trafo_dayas.layout')

@section('content')
<div class="container">
    <h2>Edit Trafo Daya</h2>

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

    <form action="{{ route('trafo_dayas.update', $trafo_daya->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>ID Gardu Induk:</label>
            <input type="number" name="id_gardu_induk" value="{{ $trafo_daya->id_gardu_induk }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama:</label>
            <input type="text" name="nama" value="{{ $trafo_daya->nama }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kapasitas:</label>
            <input type="text" name="kap" value="{{ $trafo_daya->kap }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Setting Rele:</label>
            <input type="text" name="setting_rele" value="{{ $trafo_daya->setting_rele }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('trafo_dayas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
