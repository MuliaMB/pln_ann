@extends('gardu_induks.layout')

@section('content')
<div class="container">
    <h2>Tambah Gardu Induk</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan input:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gardu_induks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Gardu Induk:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('gardu_induks.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
