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
        </div>
    </div>

    <!-- Vendor Modal -->
    <div id="vendorModal" class="fixed inset-0 bg-black bg-opacity-50 hidden">
        <div class="max-w-3xl mx-auto mt-20 p-6 bg-white rounded-lg shadow-lg relative">
            <button onclick="closeModal('vendorModal')" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                &times;
            </button>
            <h2 id="vendorTitle" class="text-xl font-bold text-gray-800 mb-4">Vendors</h2>
            <div id="vendorList" class="space-y-4">
                <!-- Vendor details will be injected here -->
            </div>
        </div>
    </div>

    <!-- Items Modal -->
    <div id="itemsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden">
        <div class="max-w-3xl mx-auto mt-20 p-6 bg-white rounded-lg shadow-lg relative">
            <button onclick="closeModal('itemsModal')" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                &times;
            </button>
            <h2 id="itemsTitle" class="text-xl font-bold text-gray-800 mb-4">Items</h2>
            <div id="itemsList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Items will be injected here -->
            </div>
        </div>
    </div>

    <script>
        // Sample vendor data
        const vendorData = {
            "Spices": [
                { name: "Spice Vendor 1", city: "Mumbai", state: "Maharashtra", address: "123 Spice Lane", deliveryTime: "2-3 days", items: ["Chili Powder", "Turmeric", "Coriander", "Cumin", "Black Pepper"] },
                { name: "Spice Vendor 2", city: "Delhi", state: "Delhi", address: "456 Market Road", deliveryTime: "1-2 days", items: ["Cardamom", "Cloves", "Cinnamon", "Nutmeg", "Bay Leaf"] },
                { name: "Spice Vendor 3", city: "Bangalore", state: "Karnataka", address: "789 Main Street", deliveryTime: "3-4 days", items: ["Fenugreek", "Mustard Seeds", "Asafoetida", "Star Anise", "Garam Masala"] }
            ]
        };

        // Function to show vendor modal
        function showVendors(category) {
            const modal = document.getElementById("vendorModal");
            const vendorList = document.getElementById("vendorList");
            const vendorTitle = document.getElementById("vendorTitle");

            // Set category title
            vendorTitle.innerText = `Vendors for ${category}`;

            // Clear any existing vendor details
            vendorList.innerHTML = "";

            // Populate vendor details
            if (vendorData[category]) {
                vendorData[category].forEach((vendor, index) => {
                    const vendorDiv = document.createElement("div");
                    vendorDiv.className = "border border-gray-200 rounded-lg p-4 bg-gray-50";
                    vendorDiv.innerHTML = `
                        <h3 class="text-lg font-semibold text-gray-800">${vendor.name}</h3>
                        <p class="text-sm text-gray-600">City: ${vendor.city}, State: ${vendor.state}</p>
                        <p class="text-sm text-gray-600">Address: ${vendor.address}</p>
                        <p class="text-sm text-gray-600">Delivery Time: ${vendor.deliveryTime}</p>
                        <button onclick="showItems('${category}', ${index})" class="mt-2 bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600">View Items</button>
                    `;
                    vendorList.appendChild(vendorDiv);
                });
            } else {
                vendorList.innerHTML = `<p class="text-gray-600">No vendors available for ${category}.</p>`;
            }

            // Show modal
            modal.classList.remove("hidden");
        }

        // Function to show items modal
        function showItems(category, vendorIndex) {
            const modal = document.getElementById("itemsModal");
            const itemsList = document.getElementById("itemsList");
            const itemsTitle = document.getElementById("itemsTitle");

            // Set vendor title
            itemsTitle.innerText = `Items from ${vendorData[category][vendorIndex].name}`;

            // Clear any existing items
            itemsList.innerHTML = "";

            // Populate items
            vendorData[category][vendorIndex].items.forEach(item => {
                const itemDiv = document.createElement("div");
                itemDiv.className = "border border-gray-200 rounded-lg p-4 bg-gray-50 text-center";
                itemDiv.innerHTML = `
                    <h3 class="text-md font-semibold text-gray-800">${item}</h3>
                `;
                itemsList.appendChild(itemDiv);
            });

            // Show modal
            modal.classList.remove("hidden");
        }

        // Function to close modal
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add("hidden");
        }
    </script>
</body>
</html>
