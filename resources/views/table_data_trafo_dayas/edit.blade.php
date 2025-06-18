@extends('table_data_trafo_dayas.layout')

@section('content')
<div class="container">
    <h2>Edit Data Trafo Daya</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('table_data_trafo_dayas.update', $table_data_trafo_daya->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_trafo_daya" class="form-label">Trafo Daya</label>
            <select name="id_trafo_daya" id="id_trafo_daya" class="form-control" required>
                <option value="">-- Pilih Trafo Daya --</option>
                @foreach($trafo_dayas as $trafo)
                    <option value="{{ $trafo->id }}" {{ (old('id_trafo_daya', $table_data_trafo_daya->id_trafo_daya) == $trafo->id) ? 'selected' : '' }}>{{ $trafo->nama }}</option>
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
                   value="{{ old($field['name'], $table_data_trafo_daya->{$field['name']}) }}" 
                   required>
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('table_data_trafo_dayas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
