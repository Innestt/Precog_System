<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Prediction;

class PredictionController extends Controller
{
    public function predict(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'age' => 'required|integer',
            'kmDriven' => 'required|integer',
            'transmission' => 'required|string',
            'owner' => 'required|string',
            'fuelType' => 'required|string',
        ]);

        try {
            // ✅ Log the request before sending it
            Log::info("🚀 Sending request to Flask API: ", $request->except('_token'));

            // Send data to Flask API
            $response = Http::withOptions([
                'proxy' => '' // ✅ Ensures no proxy is used
            ])
            ->withoutVerifying()
            ->timeout(10)
            ->post('http://127.0.0.1:5000/predict', $request->except('_token'));
        

            // ✅ Log the response received from Flask
            Log::info("📥 API Response: ", $response->json());

            // Check if the request failed
            if ($response->failed()) {
                Log::error('❌ Failed to connect to Flask API', ['response' => $response->body()]);
                return back()->with('error', 'Failed to connect to prediction API.');
            }

            // Decode JSON response
            $responseData = $response->json();

            // Check if 'predicted_price' exists
            if (!isset($responseData['predicted_price'])) {
                Log::error('❌ Invalid response from Flask API', ['response' => $responseData]);
                return back()->with('error', 'Invalid response from prediction API.');
            }

            $predicted_price = $responseData['predicted_price'];

            // Save prediction to the database
            Prediction::create([
                'brand' => $validatedData['brand'],
                'model' => $validatedData['model'],
                'year' => $validatedData['year'],
                'age' => $validatedData['age'],
                'kmDriven' => $validatedData['kmDriven'],
                'transmission' => $validatedData['transmission'],
                'owner' => $validatedData['owner'],
                'fuelType' => $validatedData['fuelType'],
                'predicted_price' => $predicted_price
            ]);

            // Return view with predicted price
            return view('search', compact('predicted_price'))->with('success', 'Prediction successful');

        } catch (\Exception $e) {
            Log::error('❌ Error in PredictionController', ['error' => $e->getMessage()]);
            return back()->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }
}
