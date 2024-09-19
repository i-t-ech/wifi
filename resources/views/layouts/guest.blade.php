<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TRUSTED WIFI') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Custom Styles -->
        <style>
            /* Ensure the page takes up the full height */
            html, body {
                height: 100%;
                margin: 0;
                overflow-x: hidden; /* Prevent horizontal scrolling */
            }

            /* Full-width header and footer */
            header, footer {
                width: 100%;
                background-color: rgba(155, 89, 182, 0.8); /* Semi-transparent background */
                color: white;
                padding: 10px 0;
                text-align: center;
                box-sizing: border-box;
            }

            /* Container for the main content */
            .main-content {
                min-height: calc(100vh - 120px); /* Adjust if header/footer height changes */
                display: flex;
                flex-direction: column;
                justify-content: center; /* Center content vertically */
            }

            /* Background Image Styling */
            .background-wrapper {
                flex: 1;
                background-image: url('{{ asset('images/background image.jpg') }}'); /* Update with your image path */
                background-size: cover; /* Cover the container */
                background-position: center; /* Center the image */
                background-repeat: no-repeat; /* Do not repeat the image */
                width: 100%;
                height: 100%; /* Ensure it takes the full height of its parent */
                display: flex;
                justify-content: center; /* Center the form horizontally */
                align-items: center; /* Center the form vertically */
                padding: 20px; /* Padding to ensure content does not touch edges */
            }

            /* Form container styling */
            .form-container {
                background-color: rgba(255, 255, 255, 0.9); /* White background for form with some transparency */
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                padding: 20px;
                width: 100%;
                max-width: 400px; /* Adjust as needed */
            }

            /* Updated Form Logo Styling */
            .form-logo {
                width: 60px;
                height: 60px;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Header -->
        <header>
            <div class="logo-container text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Trusted WiFi Logo" class="logo">
                <h1 class="mt-2">TRUSTED WiFi</h1>
                <p>Affordable LAN</p>
            </div>
        </header>

        <!-- Main Content -->
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900 main-content background-wrapper">
            <!-- Logo Above Form -->
            <div>
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Form Logo" class="form-logo" />
                </a>
            </div>

            <!-- Form Container -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg form-container">
                {{ $slot }}
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; {{ date('Y') }} Trusted WiFi. All rights reserved.</p>
        </footer>
    </body>
</html>
