@extends('layouts.main')

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
                <option value="{{ $penyulang->id }}" {{ old('id_penyulang') == $penyulang->id ? 'selected' : '' }}>
                    {{ $penyulang->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="number" class="form-control" id="bulan" name="bulan" required>
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" required>
        </div>

        <div class="mb-3">
            <label for="amp_siang" class="form-label">Amp Siang</label>
            <input type="text" class="form-control" id="amp_siang" name="amp_siang" required>
        </div>

        <div class="mb-3">
            <label for="teg_siang" class="form-label">Tegangan Siang</label>
            <input type="text" class="form-control" id="teg_siang" name="teg_siang" required>
        </div>

        <div class="mb-3">
            <label for="mw_siang" class="form-label">MW Siang</label>
            <input type="text" class="form-control" id="mw_siang" name="mw_siang" required>
        </div>

        <div class="mb-3">
            <label for="persen_siang" class="form-label">% Siang</label>
            <input type="text" class="form-control" id="persen_siang" name="persen_siang" readonly>
        </div>

        <div class="mb-3">
            <label for="amp_malam" class="form-label">Amp Malam</label>
            <input type="text" class="form-control" id="amp_malam" name="amp_malam" required>
        </div>

        <div class="mb-3">
            <label for="teg_malam" class="form-label">Tegangan Malam</label>
            <input type="text" class="form-control" id="teg_malam" name="teg_malam" required>
        </div>

        <div class="mb-3">
            <label for="mw_malam" class="form-label">MW Malam</label>
            <input type="text" class="form-control" id="mw_malam" name="mw_malam" required>
        </div>

        <div class="mb-3">
            <label for="persen_malam" class="form-label">% Malam</label>
            <input type="text" class="form-control" id="persen_malam" name="persen_malam" readonly>
        </div>

        {{-- Tombol Hitung Persentase --}}
        <button type="button" class="btn btn-info mb-3" onclick="hitungPersentase()">Hitung Persentase</button>

        <br>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('table_data_penyulangs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

{{-- JavaScript --}}
<script>
    function hitungPersentase() {
        let ampSiang = parseFloat(document.getElementById('amp_siang').value) || 0;
        let mwSiang = parseFloat(document.getElementById('mw_siang').value) || 0;
        let ampMalam = parseFloat(document.getElementById('amp_malam').value) || 0;
        let mwMalam = parseFloat(document.getElementById('mw_malam').value) || 0;

        let persenSiang = (ampSiang > 0) ? (mwSiang / (ampSiang * 0.9)) * 100 : 0;
        let persenMalam = (ampMalam > 0) ? (mwMalam / (ampMalam * 0.9)) * 100 : 0;

        document.getElementById('persen_siang').value = persenSiang.toFixed(2);
        document.getElementById('persen_malam').value = persenMalam.toFixed(2);
    }
</script>
@endsection
