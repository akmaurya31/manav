<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category: Kitchen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-7xl mx-auto p-4 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">Category: Kitchen</h1>
        <h2 class="text-xl font-medium text-center text-gray-600 mb-8">Explore Our Products</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Category: Spices -->
            <button onclick="showVendors('Spices')" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Spices" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Spices</h3>
            </button>
            <!-- Other Categories -->
            <a href="#rice" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Rice" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Rice</h3>
            </a>
            <a href="#lentils" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Lentils" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Lentils</h3>
            </a>
            <a href="#lentils" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Lentils" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Lentils</h3>
            </a> <a href="#lentils" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Lentils" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Lentils</h3>
            </a> <a href="#lentils" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Lentils" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Lentils</h3>
            </a> <a href="#lentils" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Lentils" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Lentils</h3>
            </a> <a href="#lentils" class="block bg-gray-50 border border-gray-200 rounded-lg p-4 text-center shadow-sm hover:bg-gray-100">
                <img src="https://via.placeholder.com/100" alt="Lentils" class="w-20 h-20 mx-auto rounded-lg mb-2">
                <h3 class="text-md font-semibold text-gray-800">Lentils</h3>
            </a>


        </div>
    </div>

    <!-- Modal for Vendor Details -->
    <div id="vendorModal" class="fixed inset-0 bg-black bg-opacity-50 hidden">
        <div class="max-w-3xl mx-auto mt-20 p-6 bg-white rounded-lg shadow-lg relative">
            <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                &times;
            </button>
            <h2 id="categoryTitle" class="text-xl font-bold text-gray-800 mb-4">Vendors</h2>
            <div id="vendorList" class="space-y-4">
                <!-- Vendor details will be injected here -->
            </div>
        </div>
    </div>

    <script>
        // Sample vendor data
        const vendorData = {
            "Spices": [
                { name: "Spice Vendor 1", city: "Mumbai", state: "Maharashtra", address: "123 Spice Lane", deliveryTime: "2-3 days" },
                { name: "Spice Vendor 2", city: "Delhi", state: "Delhi", address: "456 Market Road", deliveryTime: "1-2 days" },
                { name: "Spice Vendor 3", city: "Bangalore", state: "Karnataka", address: "789 Main Street", deliveryTime: "3-4 days" }
            ]
        };

        // Function to show vendor modal
        function showVendors(category) {
            const modal = document.getElementById("vendorModal");
            const vendorList = document.getElementById("vendorList");
            const categoryTitle = document.getElementById("categoryTitle");

            // Set category title
            categoryTitle.innerText = `Vendors for ${category}`;

            // Clear any existing vendor details
            vendorList.innerHTML = "";

            // Populate vendor details
            if (vendorData[category]) {
                vendorData[category].forEach(vendor => {
                    const vendorDiv = document.createElement("div");
                    vendorDiv.className = "border border-gray-200 rounded-lg p-4 bg-gray-50";
                    vendorDiv.innerHTML = `
                        <h3 class="text-lg font-semibold text-gray-800">${vendor.name}</h3>
                        <p class="text-sm text-gray-600">City: ${vendor.city}, State: ${vendor.state}</p>
                        <p class="text-sm text-gray-600">Address: ${vendor.address}</p>
                        <p class="text-sm text-gray-600">Delivery Time: ${vendor.deliveryTime}</p>
                    `;
                    vendorList.appendChild(vendorDiv);
                });
            } else {
                vendorList.innerHTML = `<p class="text-gray-600">No vendors available for ${category}.</p>`;
            }

            // Show modal
            modal.classList.remove("hidden");
        }

        // Function to close modal
        function closeModal() {
            const modal = document.getElementById("vendorModal");
            modal.classList.add("hidden");
        }
    </script>
</body>
</html>
