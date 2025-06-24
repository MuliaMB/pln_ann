<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PredictController extends Controller
{
    public function showPredictionForm()
    {
        $garduInduks = DB::table('gardu_induks')->select('id', 'nama')->get();
        return view('prediction_form', compact('garduInduks'));
    }

    public function predict(Request $request)
    {
        try {
            $request->validate([
                'gardu_induk_id' => 'required',
            ], [
                'gardu_induk_id.required' => 'Gardu Induk ID is required',
                'gardu_induk_id.exists' => 'Selected Gardu Induk does not exist',
            ]);
            $garduIndukId = $request->input('gardu_induk_id');
            $garduInduk = DB::table('gardu_induks')->where('id', $garduIndukId)->first();
            if (!$garduInduk) {
                return redirect()->back()->with('error', 'Gardu Induk not found');
            }

            // Fetch latest data for prediction with more complete information
            $latestData = DB::table('table_data_penyulangs as tdp')
                ->join('penyulangs as p', 'tdp.id_penyulang', '=', 'p.id')
                ->join('trafo_dayas as td', 'p.id_trafo_daya', '=', 'td.id')
                ->where('td.id_gardu_induk', $garduIndukId)
                ->select(
                    'tdp.*',
                    'p.nama as penyulang_nama',
                    'td.nama as trafo_daya_nama'
                )
                ->latest('tdp.created_at')
                ->first();

            // Check if data exists
            if (!$latestData) {
                return redirect()->back()->with('error', 'No data found for the selected Gardu Induk');
            }

            // Prepare data for API using real database values
            $apiData = [
                'gardu_induk' => $garduInduk->nama,
                'trafo_daya' => $latestData->trafo_daya_nama ?? 'Unknown',
                'penyulang' => $latestData->penyulang_nama ?? 'Unknown',
                'amp_siang' => (string)($latestData->amp_siang ?? 0),
                'teg_siang' => (string)($latestData->teg_siang ?? 0),
                'mw_siang' => (string)($latestData->mw_siang ?? 0),
                'amp_malam' => (string)($latestData->amp_malam ?? 0),
                'teg_malam' => (string)($latestData->teg_malam ?? 0),
                'mw_malam' => (string)($latestData->mw_malam ?? 0),
            ];

            Log::info('Sending API request with data: ' . json_encode($apiData));

            // Send form data to API (this approach worked for you)
            $response = Http::timeout(30)
                ->asForm()
                ->post('https://muliamb.pythonanywhere.com/proses', $apiData);

            Log::info('API Response Status: ' . $response->status());
            Log::info('API Response Body: ' . $response->body());

            if ($response->successful()) {
                $prediction = $response->json();

                // Add additional info for the view
                $additionalInfo = [
                    'data_timestamp' => $latestData->created_at,
                    'gardu_induk_id' => $garduIndukId,
                ];

                return view('prediction_result', compact('garduInduk', 'prediction', 'apiData', 'additionalInfo'));
            } else {
                $errorMessage = 'API request failed. ';
                $errorMessage .= 'Status: ' . $response->status() . '. ';
                $errorMessage .= 'Response: ' . substr($response->body(), 0, 300);

                Log::error('API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'data_sent' => $apiData
                ]);

                return redirect()->back()->with('error', $errorMessage);
            }
        } catch (\Exception $e) {
            Log::error('Prediction error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
