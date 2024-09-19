{{-- 
 @extends('layouts.app')

@section('content')
<div class="main-content px-4 py-6 mx-auto max-w-7xl">
    <!-- Account Balance Card -->
    <div class="flex justify-center mb-6 mt-8">
        <div class="bg-white text-blue-800 p-6 rounded-lg shadow-lg w-full max-w-md" style="border-radius: 20px;">
            <h2 class="text-xl font-bold mb-4 text-center">My Account</h2>
            <div class="text-center">
                <h3 class="text-2xl font-semibold">Account Balance</h3>
                <p class="text-3xl font-bold mt-2">{{ $accountBalance }}</p>
            </div>
        </div>
    </div>

    <!-- Account Details Horizontal Layout -->
    <div class="flex flex-wrap justify-between mb-6">
        <!-- Remaining Bundles -->
        <div class="w-full md:w-1/2 lg:w-1/3 p-2">
            <div class="bg-gray-100 text-gray-800 p-6 shadow-lg rounded-lg" style="border-radius: 15px;">
                <h3 class="text-md font-semibold mb-2">Remaining Bundles</h3>
                <p>{{ $remainingBundles }}</p>
            </div>
        </div>
        <!-- Last Purchase Time -->
        <div class="w-full md:w-1/2 lg:w-1/3 p-2">
            <div class="bg-gray-100 text-gray-800 p-6 shadow-lg rounded-lg" style="border-radius: 15px;">
                <h3 class="text-md font-semibold mb-2">Last Purchase Time</h3>
                <p>{{ $lastPurchaseTime }}</p>
            </div>
        </div>
        <!-- Expiry Time -->
        <div class="w-full md:w-1/2 lg:w-1/3 p-2">
            <div class="bg-gray-100 text-gray-800 p-6 shadow-lg rounded-lg" style="border-radius: 15px;">
                <h3 class="text-md font-semibold mb-2">Expiry Time</h3>
                <p>{{ $expiryTime }}</p>
            </div>
        </div>
    </div>

    <!-- Speed and Bundle Usage Horizontal Layout -->
    <div class="flex flex-wrap justify-between mb-6">
        <div class="w-full p-2">
            <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-lg">
                <div class="w-full text-center">
                    <h3 class="text-md font-semibold">Bundle Usage</h3>
                    <p>{{ $bundleUsage }} MB</p>
                </div>
                <div class="w-full text-center">
                    <h3 class="text-md font-semibold">Speed</h3>
                    <p>{{ $speed }} Mbps</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mb-6">
        <!-- Buttons Container -->
        <div class="flex justify-center gap-4 mb-4">
            <!-- Buy Bundles Button -->
            <button id="buyBundlesButton" class="buy-bundles-btn">
                Buy Bundles
            </button>

            <!-- Claim Button -->
            <button onclick="document.getElementById('claim-modal').classList.toggle('hidden')" class="claim-btn">
                Claim
            </button>
        </div>

        <!-- Contact Us Button -->
        <div class="flex justify-center">
            <a href="{{ route('contact') }}" class="contact-btn">
                <i class="fas fa-phone-alt"></i> Contact Us
            </a>
        </div>
    </div>

    <!-- Claim Modal -->
    <div id="claim-modal" class="hidden mb-6">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full mx-auto" style="border-radius: 15px;">
            <h3 class="text-lg font-semibold mb-4">Claim Failed Transaction</h3>
            <form action="{{ route('claim-transaction') }}" method="POST">
                @csrf
                <label for="mpesa_code" class="block mb-2">MPESA Code:</label>
                <input type="text" id="mpesa_code" name="mpesa_code" class="border rounded px-3 py-2 w-full mb-4" required>
                <div class="flex justify-between">
                    <!-- Submit Button -->
                    <button type="submit" class="modal-submit-btn">Submit</button>
                    
                    <!-- Close Button -->
                    <button type="button" onclick="document.getElementById('claim-modal').classList.add('hidden')" class="modal-close-btn">Close</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Packages Section -->
    <div id="packagesSection" class="hidden mt-6">
        <h2 class="text-2xl font-bold mb-4 text-center">Access Affordable Packages</h2>
        <div class="packages-section grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @foreach ($packages as $key => $package)
                <a href="{{ route('payment', ['package' => $key]) }}" class="package-btn block text-center py-4 px-6 rounded-lg" style="background-color: {{ $package['color'] }};">
                    {{ $package['name'] }}<br>KSh {{ $package['price'] }}
                </a>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.getElementById('buyBundlesButton').addEventListener('click', function() {
        const packagesSection = document.getElementById('packagesSection');
        packagesSection.classList.toggle('hidden');
    });
</script>
@endsection

<style>
    .modal-submit-btn {
        background-color: #28a745; /* Green for submit */
        color: white;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: bold;
        transition: background-color 0.3s ease-in-out, transform 0.2s;
    }

    .modal-close-btn {
        background-color: #dc3545; /* Red for close */
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
</style>
 --}}
 @extends('layouts.app')

 @section('content')
 <div class="main-content px-4 py-6 mx-auto max-w-7xl">
     <!-- Account Balance Card -->
     <div class="flex justify-center mb-6 mt-8">
         <div class="bg-white text-blue-800 p-6 rounded-lg shadow-lg w-full max-w-md" style="border-radius: 20px;">
             <h2 class="text-xl font-bold mb-4 text-center">My Account</h2>
             <div class="text-center">
                 <h3 class="text-2xl font-semibold">Account Balance</h3>
                 <p class="text-3xl font-bold mt-2">{{ $accountBalance }}</p>
             </div>
         </div>
     </div>
 
     <!-- Account Details Horizontal Layout -->
     <div class="flex flex-wrap justify-between mb-6">
         <!-- Remaining Bundles -->
         <div class="w-full md:w-1/2 lg:w-1/3 p-2">
             <div class="bg-gray-100 text-gray-800 p-6 shadow-lg rounded-lg" style="border-radius: 15px;">
                 <h3 class="text-md font-semibold mb-2">Remaining Bundles</h3>
                 <p>{{ $remainingBundles }}</p>
             </div>
         </div>
         <!-- Last Purchase Time -->
         <div class="w-full md:w-1/2 lg:w-1/3 p-2">
             <div class="bg-gray-100 text-gray-800 p-6 shadow-lg rounded-lg" style="border-radius: 15px;">
                 <h3 class="text-md font-semibold mb-2">Last Purchase Time</h3>
                 <p>{{ $lastPurchaseTime }}</p>
             </div>
         </div>
         <!-- Expiry Time -->
         <div class="w-full md:w-1/2 lg:w-1/3 p-2">
             <div class="bg-gray-100 text-gray-800 p-6 shadow-lg rounded-lg" style="border-radius: 15px;">
                 <h3 class="text-md font-semibold mb-2">Expiry Time</h3>
                 <p>{{ $expiryTime }}</p>
             </div>
         </div>
     </div>
 
     <!-- Speed and Bundle Usage Horizontal Layout -->
     <div class="flex flex-wrap justify-between mb-6">
         <div class="w-full p-2">
             <div class="flex justify-between bg-gray-100 p-4 rounded-lg shadow-lg">
                 <div class="w-full text-center">
                     <h3 class="text-md font-semibold">Bundle Usage</h3>
                     <p>{{ $bundleUsage }} MB</p>
                 </div>
                 <div class="w-full text-center">
                     <h3 class="text-md font-semibold">Speed</h3>
                     <p>{{ $speed }} Mbps</p>
                 </div>
             </div>
         </div>
     </div>
 
     <!-- Action Buttons -->
     <div class="mb-6">
         <!-- Buttons Container -->
         <div class="flex justify-center gap-4 mb-4">
             <!-- Buy Bundles Button -->
             <button id="buyBundlesButton" class="buy-bundles-btn" onclick="document.getElementById('packagesSection').classList.toggle('hidden')">
                 Buy Bundles
             </button>
 
             <!-- Claim Button -->
             <button onclick="document.getElementById('claim-modal').classList.toggle('hidden')" class="claim-btn">
                 Claim
             </button>
         </div>
 
         <!-- Contact Us Button -->
         <div class="flex justify-center">
             <a href="{{ route('contact') }}" class="contact-btn">
                 <i class="fas fa-phone-alt"></i> Contact Us
             </a>
         </div>
     </div>
 
     <!-- Claim Modal -->
     <div id="claim-modal" class="hidden mb-6">
         <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full mx-auto" style="border-radius: 15px;">
             <h3 class="text-lg font-semibold mb-4">Claim Failed Transaction</h3>
             <form action="{{ route('claim-transaction') }}" method="POST">
                 @csrf
                 <label for="mpesa_code" class="block mb-2">MPESA Code:</label>
                 <input type="text" id="mpesa_code" name="mpesa_code" class="border rounded px-3 py-2 w-full mb-4" required>
                 <div class="flex justify-between">
                     <!-- Submit Button -->
                     <button type="submit" class="modal-submit-btn">Submit</button>
                     
                     <!-- Close Button -->
                     <button type="button" onclick="document.getElementById('claim-modal').classList.add('hidden')" class="modal-close-btn">Close</button>
                 </div>
             </form>
         </div>
     </div>
 
     <!-- Packages Section -->
     <div id="packagesSection" class="hidden mt-6">
         <h2 class="text-2xl font-bold mb-4 text-center">Access Affordable Packages</h2>
         <div class="packages-section grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
             @foreach ($packages as $key => $package)
                 <form action="{{ route('stk-push') }}" method="POST" class="package-form">
                     @csrf
                     <input type="hidden" name="amount" value="{{ $package['price'] }}">
                     <input type="hidden" name="package" value="{{ $package['name'] }}">
                     <button type="submit" class="package-btn block text-center py-4 px-6 rounded-lg" style="background-color: {{ $package['color'] }};">
                         {{ $package['name'] }}<br>KSh {{ $package['price'] }}
                     </button>
                 </form>
             @endforeach
         </div>
     </div>
 </div>
 
 <style>
     /* Custom CSS for Buy Bundles Button */
     .buy-bundles-btn {
         background-color: #007bff;
         color: white;
         border: none;
         padding: 10px 20px;
         border-radius: 5px;
         cursor: pointer;
     }
 
     .buy-bundles-btn:hover {
         background-color: #0056b3;
     }
 
     /* Custom CSS for Claim Button */
     .claim-btn {
         background-color: #28a745;
         color: white;
         border: none;
         padding: 10px 20px;
         border-radius: 5px;
         cursor: pointer;
     }
 
     .claim-btn:hover {
         background-color: #218838;
     }
 
     /* Custom CSS for Contact Us Button */
     .contact-btn {
         background-color: #17a2b8;
         color: white;
         padding: 10px 20px;
         border-radius: 5px;
         text-decoration: none;
     }
 
     .contact-btn:hover {
         background-color: #138496;
     }
 
     /* Custom CSS for Modal Submit Button */
     .modal-submit-btn {
         background-color: #007bff;
         color: white;
         border: none;
         padding: 10px 20px;
         border-radius: 5px;
         cursor: pointer;
     }
 
     .modal-submit-btn:hover {
         background-color: #0056b3;
     }
 
     /* Custom CSS for Modal Close Button */
     .modal-close-btn {
         background-color: #dc3545;
         color: white;
         border: none;
         padding: 10px 20px;
         border-radius: 5px;
         cursor: pointer;
     }
 
     .modal-close-btn:hover {
         background-color: #c82333;
     }
 
     /* Custom CSS for Package Button */
     .package-btn {
         color: white;
         border: none;
         padding: 10px;
         border-radius: 10px;
         font-size: 16px;
         cursor: pointer;
     }
 </style>
 @endsection
 