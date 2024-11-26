<?php include('headerk.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List - Add/Edit in Modal</title>
    <!-- Tailwind CSS for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<div class="flex justify-center items-center h-full">
    <div class="container mx-auto bg-white p-4 shadow-md rounded-lg w-full max-w-4xl">
        <h2 class="text-2xl font-semibold">Product List</h2>
        <button id="openAddProductModal" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add New Product</button>

        <!-- Table to display the products -->
        <table class="mt-4 w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">#</th>
                    <th class="py-2 px-4 border">Product Name</th>
                    <th class="py-2 px-4 border">Product Code</th>
                    <th class="py-2 px-4 border">Status</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody id="productTable">
                <!-- Product rows will go here dynamically -->
            </tbody>
        </table>

        <!-- Add Product Button (Triggers the Modal) -->
        <button id="openAddProductModal" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add New Product</button>
    </div>
</div>

<!-- Add Product Modal -->
<div id="addProductModal" class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="modal-dialog bg-white rounded-lg shadow-lg p-6">
        <div class="modal-header flex justify-between items-center">
            <h5 class="text-xl font-semibold">Add Product</h5>
            <button id="closeAddProductModal" type="button" class="text-gray-600 hover:text-gray-800">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="addProductForm">
                <div class="mb-4">
                    <label for="productName" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" class="mt-1 block w-full px-4 py-2 border rounded-md" id="productName" required>
                </div>

                <div class="mb-4">
    <label for="productCode" class="block text-sm font-medium text-gray-700">Product Code</label>
    <input type="text" class="mt-1 block w-full px-4 py-2 border rounded-md" id="productCode" required>
</div>
<div class="mb-4">
    <label for="productStatus" class="block text-sm font-medium text-gray-700">Status</label>
    <select id="productStatus" class="mt-1 block w-full px-4 py-2 border rounded-md">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>
</div>


                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add Product</button>
            </form>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div id="editProductModal" class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="modal-dialog bg-white rounded-lg shadow-lg p-6">
        <div class="modal-header flex justify-between items-center">
            <h5 class="text-xl font-semibold">Edit Product</h5>
            <button id="closeEditProductModal" type="button" class="text-gray-600 hover:text-gray-800">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="editProductForm">
                <input type="hidden" id="editProductId">
                <div class="mb-4">
                    <label for="editProductName" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" class="mt-1 block w-full px-4 py-2 border rounded-md" id="editProductName" required>
                </div>

                <div class="mb-4">
    <label for="editProductCode" class="block text-sm font-medium text-gray-700">Product Code</label>
    <input type="text" class="mt-1 block w-full px-4 py-2 border rounded-md" id="editProductCode" required>
</div>
<div class="mb-4">
    <label for="editProductStatus" class="block text-sm font-medium text-gray-700">Status</label>
    <select id="editProductStatus" class="mt-1 block w-full px-4 py-2 border rounded-md">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>
</div>


                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update Product</button>
            </form>
        </div>
    </div>
</div>

<script>
// Function to display the products in the table
function displayProducts(products) {
    const productTable = document.getElementById("productTable");
    productTable.innerHTML = '';
    products.forEach((product, index) => {
        productTable.innerHTML += `
            <tr class="border-b">
                <td class="py-2 px-4">${index + 1}</td>
                <td class="py-2 px-4">${product.product_name}</td>
                <td class="py-2 px-4">${product.product_code}</td>
                <td class="py-2 px-4">${product.status}</td>
                <td class="py-2 px-4">
                    <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600" onclick="editProduct(${product.id})">Edit</button>
                    <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="deleteProduct(${product.id})">Delete</button>
                </td>
            </tr>
        `;
    });
}

// Function to fetch products from API using AJAX
function fetchProducts() {
      const baseURL = window.location.origin.includes('localhost') 
      ? '/manav1/manav' // Local environment
      : ''; // Production environment

    $.ajax({
        url: `${baseURL}/productslist.php`,
        method: 'GET',
        success: function(data) {
            let data1 = JSON.parse(data);
            if (Array.isArray(data1)) {
                displayProducts(data1);
            } else {
                console.error('Expected an array, but received:', data1);
            }
        },
        error: function(error) {
            console.error('Error fetching products:', error);
        }
    });
}

// Function to handle the add product form submission using AJAX
$('#addProductForm').submit(function(e) {
    e.preventDefault();
    const productName = $('#productName').val();
    const productCode = $('#productCode').val();
    const status = $('#productStatus').val();

    const baseURL = window.location.origin.includes('localhost') 
      ? '/manav1/manav' // Local environment
      : ''; // Production environment

    $.ajax({
        type: 'POST',
        url: `${baseURL}/productsadd`, // Replace with your API URL
        data: { productName, productCode, status },
        success: function(response) {
            $('#addProductModal').addClass('hidden');
            let data1 = JSON.parse(response);
            displayProducts(data1); // Refresh the product list
        },
        error: function(xhr, status, error) {
            console.error('Error adding product:', error);
            alert('An error occurred while adding the product.');
        }
    });
});


// Function to handle editing a product
function editProduct(productId) {
  const baseURL = window.location.origin.includes('localhost') 
      ? '/manav1/manav' // Local environment
      : ''; // Production environment
    $.ajax({
        type: 'GET',
        url: `${baseURL}/productsedit?id=${productId}`, // Replace with your API URL
        success: function(product) {
            let product1 = JSON.parse(product);
            $('#editProductId').val(product1.id);
            $('#editProductName').val(product1.product_name);
            $('#editProductCode').val(product1.product_code);
            $('#editProductStatus').val(product1.status);
            $('#editProductModal').removeClass('hidden');
        },
        error: function(xhr, status, error) {
            console.error('Error fetching product details:', error);
        }
    });
}


$('#editProductForm').submit(function(e) {
    e.preventDefault();
    const productId = $('#editProductId').val();
    const updatedName = $('#editProductName').val();
    const updatedCode = $('#editProductCode').val();
    const updatedStatus = $('#editProductStatus').val();
    const baseURL = window.location.origin.includes('localhost') 
      ? '/manav1/manav' // Local environment
      : ''; // Production environment
    $.ajax({
        type: 'POST',
        url: `${baseURL}/productsupdate`, // Replace with your API URL
        data: { id: productId, name: updatedName, code: updatedCode, status: updatedStatus },
        success: function(response) {
            let response1 = JSON.parse(response);
            displayProducts(response1); // Refresh the product list
            $('#editProductModal').addClass('hidden');
        },
        error: function(xhr, status, error) {
            console.error('Error updating product:', error);
        }
    });
});


// Function to delete a product using AJAX
function deleteProduct(productId) {
  const baseURL = window.location.origin.includes('localhost') 
      ? '/manav1/manav' // Local environment
      : ''; // Production environment
    $.ajax({
        type: 'DELETE',
        url: `${baseURL}/productsdelete.php?id=${productId}`, // Replace with your API URL
        success: function(response) {
            displayProducts(response); // Refresh the product list
        },
        error: function(xhr, status, error) {
            console.error('Error deleting product:', error);
        }
    });
}

// Fetch the products when the page loads
$(document).ready(function() {
    fetchProducts();

    // Close Add Product Modal
    $('#closeAddProductModal').click(function() {
        $('#addProductModal').addClass('hidden');
    });

    // Close Edit Product Modal
    $('#closeEditProductModal').click(function() {
        $('#editProductModal').addClass('hidden');
    });

    // Open Add Product Modal
    $('#openAddProductModal').click(function() {
        $('#addProductModal').removeClass('hidden');
    });
});
</script>

</body>
</html>
