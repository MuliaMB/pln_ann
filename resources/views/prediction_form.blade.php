@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">🔮 Prediksi Beban Listrik</h4>
            <small>Sistem Neural Network untuk Prediksi Beban PLN</small>
        </div>

        <div class="card-body">
            {{-- Notifikasi --}}
            @if (session('error'))
                <div class="alert alert-danger">❌ {{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    ❌
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">✅ {{ session('success') }}</div>
            @endif

            {{-- Form Prediksi --}}
            <form action="{{ route('predict') }}" method="POST" id="predictionForm">
                @csrf
                <div class="mb-3">
                    <label for="gardu_induk_id" class="form-label fw-semibold">🏭 Pilih Gardu Induk</label>
                    <select name="gardu_induk_id" id="gardu_induk_id" class="form-select" onchange="submitFormSafely()" required>
                        <option value="">-- Pilih Gardu Induk --</option>
                        @foreach ($garduInduks as $garduInduk)
                            <option value="{{ $garduInduk->id }}" {{ old('gardu_induk_id') == $garduInduk->id ? 'selected' : '' }}>
                                {{ $garduInduk->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100" id="submitButton" style="display: none;">
                    🔍 Mulai Prediksi
                </button>
            </form>

            {{-- Loading Indicator --}}
            <div class="text-center mt-3 text-primary fw-semibold" id="loadingText" style="display: none;">
                <div class="spinner-border spinner-border-sm text-primary me-2" role="status"></div>
                Memproses prediksi...
            </div>

            {{-- Informasi Sistem --}}
            <div class="alert alert-info mt-4 mb-0">
                💡 <strong>Cara Kerja Sistem:</strong><br>
                Sistem ini menggunakan Artificial Neural Network (ANN) untuk memprediksi beban listrik berdasarkan data historis Gardu Induk.
            </div>
        </div>
    </div>
</div>

{{-- Script Bootstrap & Submit --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function submitFormSafely() {
        const select = document.getElementById('gardu_induk_id');
        const loading = document.getElementById('loadingText');

        if (select.value) {
            loading.style.display = 'block';
            setTimeout(() => {
                document.getElementById('predictionForm').submit();
            }, 10);
        }
    }

    document.getElementById('predictionForm').addEventListener('submit', function () {
        document.getElementById('loadingText').style.display = 'block';
    });
</script>
@endsection