@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="mb-4">Data Penyulang</h2>

    <a href="{{ route('penyulangs.create') }}" class="btn btn-success mb-3">+ Tambah Penyulang</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Gardu</th>
                <th>ID Trafo Daya</th>
                <th>Penyulang</th>
                <th>Setting Rele</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penyulangs as $penyulang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $penyulang->trafo?->gardu?->nama }}</td>
                    <td>{{ $penyulang->trafo?->nama }}</td>
                    <td>{{ $penyulang->nama }}</td>
                    <td>{{ $penyulang->setting_rele }}</td>
                    <td>
                        <a href="{{ route('penyulangs.show', $penyulang->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('penyulangs.edit', $penyulang->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('penyulangs.destroy', $penyulang->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
