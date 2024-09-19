
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to i-Tec WiFi</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
            background-color: purple; /* Semi-transparent background */
            color: white;
            padding: 10px 0;
            text-align: center;
            box-sizing: border-box;
        }

        /* Ensure the content area stretches between header and footer */
        .main-container {
            min-height: calc(100vh - 120px); /* Adjust if header/footer height changes */
            display: flex;
            flex-direction: column;
        }

        /* Container with background image */
        .background-wrapper {
            flex: 1;
            background-image: url('{{ asset('images/background image.jpg') }}');
            background-size: cover; /* Cover the container */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
        }

        /* Content inside the background image container */
        .content {
            padding: 1rem; /* Padding for content area */
        }
/* Header logo styles */
.logo-container img {
    max-width: 50px; /* Set the maximum width to always keep it small */
    height: auto;    /* Maintain the aspect ratio */
    background-color: transparent; /* Ensure the background is transparent */
}

/* Adjust logo size for smaller screens */
@media (max-width: 768px) {
    .logo-container img {
        max-width: 30px; /* Reduce the size further for smaller screens */
    }
}

/* Header background color */
header {
    background-color: purple; /* Ensure the header color is solid */
    color: white;
}


        /* Authentication links styling */
        .auth-links {
            text-align: center;
            margin-top: 3rem; /* Increased margin-top for space from header */
        }

        .auth-links .btn {
            font-size: 0.7rem; /* Match the package button font size */
            padding: 10px 15px; /* Match the package button padding */
            border-radius: 30px;
            margin: 0.5rem; /* Margin between buttons */
            width: 170px; /* Match the package button width */
            font-weight: bold;
            text-transform: uppercase;
            display: inline-block; /* Ensure the buttons stay inline */
            color: white;
            background-color: #3498db;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out, transform 0.2s;
        }

        .auth-links .btn-secondary {
            background-color: #2ecc71; /* Green background for secondary button */
        }

        .auth-links .btn:hover {
            transform: scale(1.05);
            background-color: #2980b9; /* Slightly darker shade on hover */
        }

        /* Styling for the Affordable Packages line */
        .affordable-packages {
            color: white; /* Dark text color */
            font-weight: bold;
            font-size: 1.5rem; /* Slightly larger than normal text */
            margin-top: 2rem; /* Space from the content above */
            margin-bottom: 1rem; /* Space below the line */
            text-align: center; /* Center the text */
        }

        /* Package button styling */
        .package-btn, .call-us-btn {
            border-radius: 30px;
            padding: 10px 15px; /* Adjusted padding for buttons */
            font-size: 0.7rem; /* Smaller font size */
            font-weight: bold;
            color: white;
            text-align: center;
            display: block;
            transition: background-color 0.3s ease-in-out, transform 0.2s;
            text-decoration: none;
            height: auto; /* Allow height to adjust based on content */
            line-height: normal; /* Allow normal line height for content */
            box-sizing: border-box; /* Ensure padding does not affect width */
            width: 140px; /* Match the package button width */
            overflow: hidden; /* Prevent content from overflowing */
        }

        /* Container for package buttons */
        .packages-section {
            display: grid;
            grid-template-columns: repeat(3, min-content); /* Align buttons closer together */
            gap: 0.3rem; /* Smaller gap between buttons */
            justify-content: center; /* Center items within grid */
            margin-top: 2rem; /* Space between auth links and package buttons */
        }

        /* Hover effect */
        .package-btn:hover, .call-us-btn:hover {
            transform: scale(1.05);
        }

        /* Call Us Button styling */
        .call-us-btn {
            background-color: #3498db; /* Example color, adjust as needed */
            display: block; /* Ensure it behaves like a block element */
            margin: 1rem auto; /* Center button and add margin */
        }

        /* Phone Number Display styling */
        .phone-number {
            display: none; /* Hide by default */
            text-align: center;
            margin-top: 1rem;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container text-center">
            <img src="{{ asset('images/logo.png') }}" alt="i-Tec WiFi Logo" class="logo">
            <h1 class="mt-2">TRUST WiFi</h1>
            <p>Affordable LAN</p>
        </div>
    </header>

    <div class="main-container">
        <div class="background-wrapper">
            <div class="content">
                <div class="container">
                    <!-- Authentication links -->
                    <div class="auth-links">
                        <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
                        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                    </div>

                    <!-- Affordable Packages Line -->
                    <div class="affordable-packages">
                        Access Affordable Packages
                    </div>

                    <!-- Package buttons -->
                    <div class="packages-section">
                        @foreach ($packages as $key => $package)
                            <form action="{{ route('stk-push') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="package" value="{{ $key }}">
                                <input type="hidden" name="amount" value="{{ $package['price'] }}">
                                <button type="submit" class="package-btn">
                                    {{ $package['name'] }}<br>@ KSh {{ $package['price'] }}
                                </button>
                            </form>
                        @endforeach
                    </div>

                    <!-- Call Us Button -->
                    <a href="#" class="call-us-btn" id="callUsBtn">
                        <i class="fas fa-phone-alt"></i> Call Us
                    </a>

                    <!-- Phone Number Display -->
                    <div class="phone-number" id="phoneNumber">
                        <p>Call us at: +254 123 456 789</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Trust WiFi. All rights reserved.</p>
    </footer>

    <!-- Include JavaScript to handle button colors and interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Retrieve all package buttons
            const packageButtons = document.querySelectorAll('.package-btn');

            // Define an array of colors
            const colors = [
                '#3498db', /* Blue */
                '#2ecc71', /* Green */
                '#e74c3c', /* Red */
                '#f39c12', /* Orange */
                '#9b59b6', /* Purple */
                '#1abc9c', /* Teal */
                '#e67e22', /* Carrot */
                '#d35400', /* Orange */
                '#c0392b', /* Red */
                '#16a085'  /* Green Sea */
            ];

            // Loop through each package button and apply a color
            packageButtons.forEach((button, index) => {
                // Use the modulo operator to handle cases when there are more buttons than colors
                const colorIndex = index % colors.length;
                button.style.backgroundColor = colors[colorIndex];
            });

            // Handle Call Us button click
            const callUsBtn = document.getElementById('callUsBtn');
            const phoneNumberDiv = document.getElementById('phoneNumber');

            callUsBtn.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent default link behavior
                
                // Toggle phone number display
                if (phoneNumberDiv.style.display === 'block') {
                    phoneNumberDiv.style.display = 'none'; // Hide phone number
                } else {
                    phoneNumberDiv.style.display = 'block'; // Show phone number
                }
            });

            // Handle clicking outside to hide phone number
            document.addEventListener('click', function (event) {
                if (!callUsBtn.contains(event.target) && !phoneNumberDiv.contains(event.target)) {
                    phoneNumberDiv.style.display = 'none'; // Hide phone number if clicking outside
                }
            });
        });
    </script>
</body>
</html>
