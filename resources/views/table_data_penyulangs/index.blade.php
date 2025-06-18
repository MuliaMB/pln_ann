@extends('table_data_penyulangs.layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Table Data Penyulangs</h2>

    <a href="{{ route('table_data_penyulangs.create') }}" class="btn btn-success mb-3">+ Tambah Data</a>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Penyulang</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Amp Siang</th>
                <th>Tegangan Siang</th>
                <th>MW Siang</th>
                <th>% Siang</th>
                <th>Amp Malam</th>
                <th>Tegangan Malam</th>
                <th>MW Malam</th>
                <th>% Malam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->penyulang->nama ?? 'N/A' }}</td>
                <td>{{ $item->bulan }}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{ $item->amp_siang }}</td>
                <td>{{ $item->teg_siang }}</td>
                <td>{{ $item->mw_siang }}</td>
                <td>{{ $item->persen_siang }}</td>
                <td>{{ $item->amp_malam }}</td>
                <td>{{ $item->teg_malam }}</td>
                <td>{{ $item->mw_malam }}</td>
                <td>{{ $item->persen_malam }}</td>
                <td>
                    <a href="{{ route('table_data_penyulangs.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('table_data_penyulangs.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('table_data_penyulangs.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
