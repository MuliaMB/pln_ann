@extends('trafo_dayas.layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Trafo Daya</h2>
    
    <a href="{{ route('trafo_dayas.create') }}" class="btn btn-success mb-3">+ Tambah Trafo Daya</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kapasitas</th>
            <th>Setting Rele</th>
            <th>Aksi</th>
        </tr>
        @foreach ($trafodayas as $i => $trafo)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $trafo->nama }}</td>
            <td>{{ $trafo->kap }}</td>
            <td>{{ $trafo->setting_rele }}</td>
            <td>
                <a class="btn btn-info btn-sm" href="{{ route('trafo_dayas.show', $trafo->id) }}">Lihat</a>
                <a class="btn btn-warning btn-sm" href="{{ route('trafo_dayas.edit', $trafo->id) }}">Edit</a>
                <form action="{{ route('trafo_dayas.destroy', $trafo->id) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $trafodayas->links() !!}
</div>
@endsection
