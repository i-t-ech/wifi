@extends('layouts.welcome')

@section('content')
    <div class="welcome">
        <!-- Authentication links -->
        <div class="auth-links text-center mb-4">
            <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
            <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
        </div>

        <!-- Packages Section -->
        <div id="packagesSection" class="mt-6">
            <h2 class="text-2xl font-bold mb-4 text-center">Access Affordable Packages</h2>
            <div class="packages-section grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @foreach ($packages as $key => $package)
                    <!-- Form to handle package purchase -->
                    <form action="{{ route('stk-push') }}" method="POST" class="package-form">
                        @csrf
                        <!-- Hidden fields to pass package details -->
                        <input type="hidden" name="amount" value="{{ $package['price'] }}">
                        <input type="hidden" name="package" value="{{ $package['name'] }}">
                        <!-- Button to submit the form -->
                        <button type="submit" class="package-btn block text-center py-4 px-6 rounded-lg" style="background-color: {{ $package['color'] }};">
                            {{ $package['name'] }}<br>KSh {{ $package['price'] }}
                        </button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
