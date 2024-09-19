
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Trust wifi') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .header-footer-bg {
            background-color: rgba(155, 89, 182, 0.8); /* Purple background with opacity */
        }

        .link-hover:hover {
            background-color: rgba(155, 89, 182, 0.6); /* Slightly darker purple for hover effect */
        }

        .nav-link {
            color: #fff; /* White color for navigation links */
            margin-right: 1rem;
            margin-bottom: 0.5rem;
        }

        .nav-container {
            display: flex;
            justify-content: flex-end; /* Align links to the right */
            margin-right: 1rem;
        }

        .logo-container {
            text-align: center;
        }

        .wifi-info {
            text-align: center;
            margin-bottom: 1rem;
        }

        main {
            max-width: 100%;
            margin: 0 auto;
            overflow-y: auto;
            height: calc(100vh - 150px); /* Adjust height based on header and footer */
        }

        .package-btn, .claim-btn, .buy-bundles-btn, .contact-btn {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 0.7rem;
            font-weight: bold;
            color: white;
            text-align: center;
            display: block;
            transition: background-color 0.3s ease-in-out, transform 0.2s;
            width: 140px;
        }

        .package-btn { background-color: #e74c3c; }
        .claim-btn { background-color: #3498db; }
        .buy-bundles-btn { background-color: #2ecc71; }
        .contact-btn { background-color: #f39c12; }

        .package-btn:hover, .claim-btn:hover, .buy-bundles-btn:hover, .contact-btn:hover {
            transform: scale(1.05);
        }

        .modal-submit-btn {
            background-color: #3498db; /* Blue for submit */
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out, transform 0.2s;
        }

        .modal-close-btn {
            background-color: #e74c3c; /* Red for close */
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out, transform 0.2s;
        }

        .modal-submit-btn:hover, .modal-close-btn:hover {
            transform: scale(1.05);
        }

        .packages-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .packages-section .package-btn {
            margin: 5px; /* Spacing between buttons */
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation Bar -->
        <header class="header-footer-bg dark:bg-purple-800 shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
                <!-- Wi-Fi Logo and Name -->
                <div class="logo-container py-4">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('path/to/your-wifi-logo.png') }}" alt="Wi-Fi Logo" class="h-12 mx-auto">
                    </a>
                </div>
                <div class="wifi-info">
                    <p class="text-xl text-gray-200">
                        {{ $wifiData['ssid'] ?? 'Trusted WiFi' }}
                    </p>
                </div>

                <!-- Navigation Links -->
                <div class="nav-container w-full flex items-center">
                    <nav class="flex space-x-4">
                        <a href="{{ route('welcome') }}" class="nav-link link-hover px-3 py-2 rounded-md text-sm font-medium">{{ __('Home') }}</a>
                        <a href="{{ route('contact') }}" class="nav-link link-hover px-3 py-2 rounded-md text-sm font-medium">{{ __('Contact') }}</a>
                        <a href="{{ route('dashboard') }}" class="nav-link link-hover px-3 py-2 rounded-md text-sm font-medium">{{ __('Account') }}</a>
                    </nav>

                    <!-- User Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-100 hover:text-gray-200 dark:hover:text-gray-300">
                                {{ Auth::user()->name }}
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.edit') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('dashboard') }}">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            
                            <x-dropdown-link href="{{ route('contact') }}">
                                {{ __('Contact') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-auto">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="header-footer-bg dark:bg-purple-800 text-center py-4 shadow-inner">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-gray-100 text-sm">
                    &copy; {{ date('Y') }} Trusted WiFi. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>  