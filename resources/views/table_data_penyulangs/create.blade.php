@extends('table_data_penyulangs.layout')

@section('content')
<div class="container">
    <h2>Tambah Data Penyulang</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('table_data_penyulangs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_penyulang" class="form-label">Penyulang</label>
            <select name="id_penyulang" id="id_penyulang" class="form-control" required>
                <option value="">-- Pilih Penyulang --</option>
                @foreach($penyulangs as $penyulang)
                    <option value="{{ $penyulang->id }}" {{ old('id_penyulang') == $penyulang->id ? 'selected' : '' }}>{{ $penyulang->nama }}</option>
                @endforeach
            </select>
        </div>

        @php
        $fields = [
            ['name' => 'bulan', 'label' => 'Bulan', 'type' => 'number'],
            ['name' => 'tahun', 'label' => 'Tahun', 'type' => 'number'],
            ['name' => 'amp_siang', 'label' => 'Amp Siang', 'type' => 'number'],
            ['name' => 'teg_siang', 'label' => 'Tegangan Siang', 'type' => 'number'],
            ['name' => 'mw_siang', 'label' => 'MW Siang', 'type' => 'number'],
            ['name' => 'persen_siang', 'label' => '% Siang', 'type' => 'text'],
            ['name' => 'amp_malam', 'label' => 'Amp Malam', 'type' => 'number'],
            ['name' => 'teg_malam', 'label' => 'Tegangan Malam', 'type' => 'number'],
            ['name' => 'mw_malam', 'label' => 'MW Malam', 'type' => 'number'],
            ['name' => 'persen_malam', 'label' => '% Malam', 'type' => 'text'],
        ];
        @endphp

        @foreach ($fields as $field)
        <div class="mb-3">
            <label for="{{ $field['name'] }}" class="form-label">{{ $field['label'] }}</label>
            <input type="{{ $field['type'] }}" 
                   class="form-control" 
                   id="{{ $field['name'] }}" 
                   name="{{ $field['name'] }}" 
                   value="{{ old($field['name']) }}" 
                   required>
        </div>
        @endforeach

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('table_data_penyulangs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
