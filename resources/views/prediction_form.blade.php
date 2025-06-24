<!DOCTYPE html>
<html>

<head>
    <title>Prediksi Beban Listrik - PLN</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
            font-weight: 300;
        }

        .header p {
            margin: 15px 0 0 0;
            opacity: 0.9;
            font-size: 1.1em;
        }

        .content {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #333;
            font-size: 1.1em;
        }

        .form-select {
            width: 100%;
            padding: 15px 20px;
            font-size: 16px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            background: white;
            transition: all 0.3s ease;
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 50px;
            box-sizing: border-box;
        }

        .form-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-select:hover {
            border-color: #667eea;
        }

        .submit-btn {
            width: 100%;
            padding: 15px 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .error-message {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .success-message {
            background: linear-gradient(135deg, #51cf66, #40c057);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .loading {
            display: none;
            text-align: center;
            margin-top: 20px;
            color: #667eea;
            font-weight: 500;
        }

        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-right: 10px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .info-box {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 0 10px 10px 0;
            margin-top: 30px;
        }

        .info-box h3 {
            margin: 0 0 10px 0;
            color: #333;
        }

        .info-box p {
            margin: 0;
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>🔮 Prediksi Beban Listrik</h1>
            <p>Sistem Neural Network untuk Prediksi Beban PLN</p>
        </div>

        <div class="content">
            @if (session('error'))
            <div class="error-message">
                ❌ {{ session('error') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="error-message">
                ❌ @foreach ($errors->all() as $error)
                {{ $error }}<br>
                @endforeach
            </div>
            @endif

            @if (session('success'))
            <div class="success-message">
                ✅ {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('predict') }}" method="POST" id="predictionForm">
                @csrf
                <div class="form-group">
                    <label for="gardu_induk_id" class="form-label">
                        🏭 Pilih Gardu Induk untuk Prediksi
                    </label>
                    <select name="gardu_induk_id" id="gardu_induk_id" class="form-select" onchange="submitFormSafely()" required>
                        <option value="">-- Pilih Gardu Induk --</option>
                        @foreach ($garduInduks as $garduInduk)
                        <option value="{{ $garduInduk->id }}" {{ old('gardu_induk_id')==$garduInduk->id ? 'selected' : '' }}>
                            {{ $garduInduk->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Submit button is now optional since form auto-submits on selection -->
                <button type="submit" class="submit-btn" id="submitButton" style="display: none;">
                    🔍 Mulai Prediksi
                </button>

                <div class="loading" id="loadingText">
                    <div class="loading-spinner"></div>
                    Memproses prediksi dengan Neural Network...
                </div>
            </form>

            <div class="info-box">
                <h3>💡 Cara Kerja Sistem</h3>
                <p>
                    Sistem ini menggunakan teknologi Artificial Neural Network (ANN) untuk memprediksi beban listrik
                    berdasarkan data historis dari Gardu Induk yang dipilih. Prediksi mencakup beban siang dan malam
                    dalam satuan Megawatt (MW).
                </p>
            </div>
        </div>
    </div>

    <script>
        function submitFormSafely() {
            const select = document.getElementById('gardu_induk_id');
            const loading = document.getElementById('loadingText');
            
            // Only submit if a valid selection is made
            if (select.value && select.value !== "") {
                // Show loading immediately
                loading.style.display = 'block';
                
                // Use setTimeout to ensure DOM is updated, then submit
                setTimeout(function() {
                    document.getElementById('predictionForm').submit();
                }, 10);
            }
        }

        // Backup: Handle manual submit button if shown
        document.getElementById('predictionForm').addEventListener('submit', function(e) {
            const loading = document.getElementById('loadingText');
            loading.style.display = 'block';
        });
    </script>
</body>

</html>