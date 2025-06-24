@extends('layouts.main')

@section('content')
<div class="container">
    <h2 class="mb-4">Data Gardu Induk</h2>

    <a href="{{ route('gardu_induks.create') }}" class="btn btn-success mb-3">+ Tambah Gardu Induk</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Gardu Induk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gardu_induks as $gardu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gardu->nama }}</td>
                    <td>
                        <a href="{{ route('gardu_induks.show', $gardu->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('gardu_induks.edit', $gardu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('gardu_induks.destroy', $gardu->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
