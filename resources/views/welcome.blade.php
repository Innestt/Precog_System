<!-- resources/views/welcome.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome to Our Website') }}</div>

                <div class="card-body">
                    <p>Welcome! Please choose an action to proceed:</p>
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    <!-- Register Button -->
                    <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
