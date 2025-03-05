<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Method to show the search page (a form for searching cars)
    public function showSearchPage()
    {
        // You can return a view for the search form
        return view('search');  // Ensure you have a 'search.blade.php' file in your 'resources/views' folder
    }

    // Method to handle the search functionality
    public function search(Request $request)
    {
        // Get car model from the input
        $carModel = $request->input('car_model');

        // Search for the car model
        $car = Car::where('model', 'like', '%' . $carModel . '%')->first();

        if ($car) {
            // Check if the car is available
            if ($car->is_available) {
                return response()->json([
                    'status' => 'available',
                    'message' => 'The car model is available.',
                    'car_id' => $car->id  // Include car ID for further actions
                ]);
            } else {
                return response()->json([
                    'status' => 'unavailable',
                    'message' => 'The car model is not available at the moment.'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'not_found',
                'message' => 'The car model was not found in our inventory.'
            ]);
        }
    }

    // Show the Predict Price page
    public function showPredictPricePage(Request $request)
    {
        // Get the car ID from the request
        $carId = $request->query('car_id'); // Assuming you pass the car ID in the query string

        // Find the car by ID
        $car = Car::find($carId);

        // If the car exists, proceed to show the price prediction
        if ($car) {
            // Here, you can add any logic for price prediction if needed
            return view('predict-price', compact('car'));  // Pass the car model to the view
        } else {
            // If the car does not exist, redirect to a fallback page or show an error
            return redirect()->route('home')->with('error', 'Car not found.');
        }
    }
}
