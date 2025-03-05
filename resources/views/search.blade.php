@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Predict the Price!</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            border: 2px solid black;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
        }

        .form-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-predict {
            display: block;
            width: 200px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Form with border, shadow, and title -->
        <div class="form-container">
            <h2 class="form-title">Predict the Price!</h2>
            <form class="row g-3">
                <!-- Make Field -->
                <div class="col-md-6">
                    <label for="make" class="form-label">Make</label>
                    <input type="text" class="form-control" id="make" placeholder="Enter car make" required>
                </div>
                <!-- Model Field -->
                <div class="col-md-6">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" id="model" placeholder="Enter car model" required>
                </div>
                <!-- Year of Manufacture Field -->
                <div class="col-md-6">
                    <label for="year" class="form-label">Year of Manufacture</label>
                    <input type="number" class="form-control" id="year" placeholder="Enter year of manufacture" required>
                </div>
                <!-- Mileage Field -->
                <div class="col-md-6">
                    <label for="mileage" class="form-label">Mileage</label>
                    <input type="number" class="form-control" id="mileage" placeholder="Enter mileage (in km)" required>
                </div>
                <!-- Fuel Type Radio Buttons -->
                <div class="col-md-6">
                    <label class="form-label">Fuel Type</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fuel" id="petrol" value="petrol" required>
                        <label class="form-check-label" for="petrol">
                            Petrol
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="fuel" id="diesel" value="diesel" required>
                        <label class="form-check-label" for="diesel">
                            Diesel
                        </label>
                    </div>
                </div>
                <!-- Predict Price Button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-predict">Predict Price</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
