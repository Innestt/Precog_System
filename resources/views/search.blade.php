@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Car Price Prediction</h1>

    {{-- Display error messages --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('predict') }}" method="POST">
        @csrf

        <!-- Brand Field -->
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" name="brand" class="form-control" required value="{{ old('brand') }}">
        </div>

        <!-- Model Field -->
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" class="form-control" required value="{{ old('model') }}">
        </div>

        <!-- Year Field -->
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" class="form-control" required value="{{ old('year') }}">
        </div>

        <!-- Age Field -->
        <div class="form-group">
            <label for="age">Age (years)</label>
            <input type="number" name="age" class="form-control" required value="{{ old('age') }}">
        </div>

        <!-- KM Driven Field -->
        <div class="form-group">
            <label for="kmDriven">KM Driven</label>
            <input type="number" name="kmDriven" class="form-control" required value="{{ old('kmDriven') }}">
        </div>

        <!-- Transmission Field -->
        <div class="form-group">
            <label for="transmission">Transmission</label>
            <select name="transmission" class="form-control" required>
                <option value="Automatic" {{ old('transmission') == 'Automatic' ? 'selected' : '' }}>Automatic</option>
                <option value="Manual" {{ old('transmission') == 'Manual' ? 'selected' : '' }}>Manual</option>
            </select>
        </div>

        <!-- Owner Field -->
        <div class="form-group">
            <label for="owner">Owner</label>
            <select name="owner" class="form-control" required>
                <option value="First" {{ old('owner') == 'First' ? 'selected' : '' }}>First</option>
                <option value="Second" {{ old('owner') == 'Second' ? 'selected' : '' }}>Second</option>
            </select>
        </div>

        <!-- Fuel Type Field -->
        <div class="form-group">
            <label for="fuelType">Fuel Type</label>
            <select name="fuelType" class="form-control" required>
                <option value="Petrol" {{ old('fuelType') == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                <option value="Diesel" {{ old('fuelType') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                <option value="CNG" {{ old('fuelType') == 'CNG' ? 'selected' : '' }}>CNG</option>
                <option value="Hybrid" {{ old('fuelType') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary mt-3">Predict Price</button>
    </form>

    {{-- Display the predicted price if it exists --}}
    @if(isset($predicted_price))
        <div class="alert alert-success mt-3">
            <h4>Predicted Price: {{ number_format($predicted_price, 2) }}</h4>
        </div>
    @endif

</div>

@endsection
