@extends('layouts.main')

@section('content')
<div class="container">
    <h2>Tambah Data Trafo Daya</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('table_data_trafo_dayas.store') }}" method="POST">
        @csrf

        <!-- Select: Trafo Daya -->
        <div class="mb-3">
            <label for="id_trafo_daya" class="form-label">Trafo Daya</label>
            <select name="id_trafo_daya" id="id_trafo_daya" class="form-control" required>
                <option value="">-- Pilih Trafo Daya --</option>
                @foreach($trafo_dayas as $trafo)
                <option value="{{ $trafo->id }}" {{ old('id_trafo_daya') == $trafo->id ? 'selected' : '' }}>
                    {{ $trafo->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Input Manual -->
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" name="bulan" id="bulan" class="form-control" value="{{ old('bulan') }}" required>
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="text" name="tahun" id="tahun" class="form-control" value="{{ old('tahun') }}" required>
        </div>

        <div class="mb-3">
            <label for="amp_siang" class="form-label">Amp Siang</label>
            <input type="text" name="amp_siang" id="amp_siang" class="form-control" value="{{ old('amp_siang') }}" required>
        </div>

        <div class="mb-3">
            <label for="teg_siang" class="form-label">Tegangan Siang</label>
            <input type="text" name="teg_siang" id="teg_siang" class="form-control" value="{{ old('teg_siang') }}" required>
        </div>

        <div class="mb-3">
            <label for="mw_siang" class="form-label">MW Siang</label>
            <input type="text" name="mw_siang" id="mw_siang" class="form-control" value="{{ old('mw_siang') }}" required>
        </div>

        <div class="mb-3">
            <label for="persen_siang" class="form-label">% Siang</label>
            <input type="text" name="persen_siang" id="persen_siang" class="form-control" value="{{ old('persen_siang') }}" readonly>
        </div>

        <div class="mb-3">
            <label for="amp_malam" class="form-label">Amp Malam</label>
            <input type="text" name="amp_malam" id="amp_malam" class="form-control" value="{{ old('amp_malam') }}" required>
        </div>

        <div class="mb-3">
            <label for="teg_malam" class="form-label">Tegangan Malam</label>
            <input type="text" name="teg_malam" id="teg_malam" class="form-control" value="{{ old('teg_malam') }}" required>
        </div>

        <div class="mb-3">
            <label for="mw_malam" class="form-label">MW Malam</label>
            <input type="text" name="mw_malam" id="mw_malam" class="form-control" value="{{ old('mw_malam') }}" required>
        </div>

        <div class="mb-3">
            <label for="persen_malam" class="form-label">% Malam</label>
            <input type="text" name="persen_malam" id="persen_malam" class="form-control" value="{{ old('persen_malam') }}" readonly>
        </div>

        <!-- Tombol Hitung -->
        <button type="button" class="btn btn-info mb-3" onclick="hitungPersentase()">Hitung Persentase</button>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('table_data_trafo_dayas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

{{-- JavaScript --}}
<script>
    function hitungPersentase() {
        const ampSiang = parseFloat(document.getElementById('amp_siang').value) || 0;
        const mwSiang = parseFloat(document.getElementById('mw_siang').value) || 0;
        const ampMalam = parseFloat(document.getElementById('amp_malam').value) || 0;
        const mwMalam = parseFloat(document.getElementById('mw_malam').value) || 0;

        const persenSiang = ampSiang > 0 ? (mwSiang / (ampSiang * 0.9)) * 100 : 0;
        const persenMalam = ampMalam > 0 ? (mwMalam / (ampMalam * 0.9)) * 100 : 0;

        document.getElementById('persen_siang').value = persenSiang.toFixed(2);
        document.getElementById('persen_malam').value = persenMalam.toFixed(2);
    }
</script>
@endsection