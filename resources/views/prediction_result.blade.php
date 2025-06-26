@extends('layouts.main')

<!DOCTYPE html>
<html>

<head>
    <title>Hasil Prediksi - {{ $garduInduk->nama }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 2.2em;
            font-weight: 300;
        }

        .header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 1.1em;
        }

        .content {
            padding: 30px;
        }

        .prediction-results {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .prediction-card {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            color: white;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .prediction-card.night {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .prediction-card h3 {
            margin: 0 0 15px 0;
            font-size: 1.3em;
            font-weight: 500;
        }

        .prediction-value {
            font-size: 2.5em;
            font-weight: bold;
            margin: 10px 0;
        }

        .prediction-unit {
            font-size: 1.1em;
            opacity: 0.9;
        }

        .data-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            margin: 20px 0;
        }

        .data-section h3 {
            color: #333;
            margin: 0 0 20px 0;
            font-size: 1.4em;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }

        .data-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .data-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            border-left: 4px solid #667eea;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .data-label {
            font-weight: 600;
            color: #666;
            font-size: 0.9em;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .data-value {
            font-size: 1.2em;
            color: #333;
            margin-top: 5px;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            background: #28a745;
            color: white;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 500;
            margin: 10px 0;
        }

        .back-button {
            display: inline-block;
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 500;
            transition: transform 0.2s;
            margin-top: 20px;
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .timestamp {
            color: #666;
            font-size: 0.9em;
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        @media (max-width: 768px) {
            .prediction-results {
                grid-template-columns: 1fr;
            }

            .data-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>🔮 Hasil Prediksi Beban Listrik</h1>
            <p>{{ $garduInduk->nama }}</p>
        </div>

        <div class="content">
            @if (isset($prediction) && $prediction['status'] == 'ok')
            <div class="status-badge">✅ Prediksi Berhasil</div>

            <div class="prediction-results">
                <div class="prediction-card">
                    <h3>🌅 Prediksi Beban Siang</h3>
                    <div class="prediction-value">{{ number_format($prediction['prediksi_mw_siang'], 4) }}</div>
                    <div class="prediction-unit">MW (Megawatt)</div>
                </div>

                <div class="prediction-card night">
                    <h3>🌙 Prediksi Beban Malam</h3>
                    <div class="prediction-value">{{ number_format($prediction['prediksi_mw_malam'], 4) }}</div>
                    <div class="prediction-unit">MW (Megawatt)</div>
                </div>
            </div>

            <div class="data-section">
                <h3>📊 Data Input Yang Digunakan</h3>
                <div class="data-grid">
                    <div class="data-item">
                        <div class="data-label">Gardu Induk</div>
                        <div class="data-value">{{ $apiData['gardu_induk'] }}</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Trafo Daya</div>
                        <div class="data-value">{{ $apiData['trafo_daya'] }}</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Penyulang</div>
                        <div class="data-value">{{ $apiData['penyulang'] }}</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Amp Siang</div>
                        <div class="data-value">{{ $apiData['amp_siang'] }} A</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Tegangan Siang</div>
                        <div class="data-value">{{ $apiData['teg_siang'] }} kV</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">MW Siang (Aktual)</div>
                        <div class="data-value">{{ $apiData['mw_siang'] }} MW</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Amp Malam</div>
                        <div class="data-value">{{ $apiData['amp_malam'] }} A</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Tegangan Malam</div>
                        <div class="data-value">{{ $apiData['teg_malam'] }} kV</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">MW Malam (Aktual)</div>
                        <div class="data-value">{{ $apiData['mw_malam'] }} MW</div>
                    </div>
                </div>
            </div>

            @if(isset($additionalInfo))
            <div class="timestamp">
                📅 Data diambil pada: {{ date('d/m/Y H:i:s', strtotime($additionalInfo['data_timestamp'])) }}
            </div>
            @endif

            @else
            <div class="data-section">
                <h3>❌ Prediksi Gagal</h3>
                <p>Tidak ada data prediksi yang valid atau terjadi kesalahan pada sistem.</p>
                @if(isset($prediction))
                <pre>{{ json_encode($prediction, JSON_PRETTY_PRINT) }}</pre>
                @endif
            </div>
            @endif

            <center>
                <a href="{{ route('prediction.form') }}" class="back-button">🔄 Prediksi Lagi</a>
            </center>
        </div>
    </div>
</body>

</html>