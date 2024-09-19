<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MPESA Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Complete Payment</h1>
        <form id="payment-form" action="{{ route('process.payment', ['package' => $package['name']]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="mpesa_pin">Enter your MPESA PIN:</label>
                <input type="password" class="form-control" id="mpesa_pin" name="mpesa_pin" required>
            </div>
            <input type="hidden" name="package_name" value="{{ $package['name'] }}">
            <button type="submit" class="btn btn-primary">Pay Now</button>
        </form>
    </div>
</body>
</html>
