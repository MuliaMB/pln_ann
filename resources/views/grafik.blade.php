<!DOCTYPE html>
<html>
<head>
    <title>Grafik Prediksi MW</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Grafik Prediksi Beban MW (12 Bulan Terakhir)</h2>

    <!-- Filter Gardu Induk -->
    <form method="GET" action="{{ url('/grafik-data') }}">
        <label for="gardu">Pilih Gardu Induk:</label>
        <select name="gardu" id="gardu">
            <option value="">-- Semua Gardu --</option>
            @foreach($garduIndukList as $gardu)
                <option value="{{ $gardu }}" {{ $selectedGardu == $gardu ? 'selected' : '' }}>
                    {{ $gardu }}
                </option>
            @endforeach
        </select>
        <button type="submit">Tampilkan</button>
    </form>

    <br>

    <!-- Chart -->
    <canvas id="prediksiChart" width="800" height="400"></canvas>

    <script>
        const labels = @json(
            $data->pluck('created_at')->map(fn($d) => \Carbon\Carbon::parse($d)->format('M Y'))
        );

        const siangData = @json($data->pluck('prediksi_mw_siang')->map(fn($v) => (float) $v));
        const malamData = @json($data->pluck('prediksi_mw_malam')->map(fn($v) => (float) $v));

        const ctx = document.getElementById('prediksiChart').getContext('2d');
        const prediksiChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Prediksi Siang (MW)',
                        data: siangData,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'Prediksi Malam (MW)',
                        data: malamData,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: false,
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Prediksi Beban Listrik per Bulan',
                        font: {
                            size: 18
                        }
                    },
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'MW'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
