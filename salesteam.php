<?php include('headerk.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Team - Add/Edit in Modal</title>
    <!-- Tailwind CSS for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<div class="flex justify-center items-center h-full">
    <div class="container mx-auto bg-white p-4 shadow-md rounded-lg w-full max-w-4xl">
        <h2 class="text-2xl font-semibold">Sales Team</h2>
        <button id="openAddSalesPersonModal" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add New Sales Person</button>

        <!-- Table to display the sales team -->
        <table class="mt-4 w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 border">#</th>
                    <th class="py-2 px-4 border">Name</th>
                    <th class="py-2 px-4 border">Email</th>
                    <th class="py-2 px-4 border">Password</th>
                    <th class="py-2 px-4 border">TeamType.</th>
                    <th class="py-2 px-4 border">Status</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody id="salesTeamTable">
                <!-- Sales team rows will go here dynamically -->
            </tbody>
        </table>
    </div>
</div>

<!-- Add Sales Person Modal -->
<div id="addSalesPersonModal" class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="modal-dialog bg-white rounded-lg shadow-lg p-6">
        <div class="modal-header flex justify-between items-center">
            <h5 class="text-xl font-semibold">Add Sales Person</h5>
            <button id="closeAddSalesPersonModal" type="button" class="text-gray-600 hover:text-gray-800">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="addSalesPersonForm">
                <div class="mb-4">
                    <label for="salesPersonName" class="block text-sm font-medium text-gray-700">Sales Person Name</label>
                    <input type="text" class="mt-1 block w-full px-4 py-2 border rounded-md" id="salesPersonName" required>
                </div>
                <div class="mb-4">
                    <label for="salesPersonEmail" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" class="mt-1 block w-full px-4 py-2 border rounded-md" id="salesPersonEmail" required>
                </div>
                <div class="mb-4">
                    <label for="salesPersonPassword" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" class="mt-1 block w-full px-4 py-2 border rounded-md" id="salesPersonPassword" required>
                </div>
                <div class="mb-4">
                    <label for="salesPersonStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="salesPersonStatus" class="mt-1 block w-full px-4 py-2 border rounded-md">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="teamtype" class="block text-sm font-medium text-gray-700">Team Type</label>
                    <select id="teamtype" class="mt-1 block w-full px-4 py-2 border rounded-md">
                        <option value="Seminar">Sales Seminar team</option>
                        <option value="G2B">G2B Team</option>
                        <option value="Franchise">Franchise Team</option>
                        <option value="DigitalIBIV">Digital IBIV Team</option>
                    </select>
                </div>


                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add Sales Person</button>
            </form>
        </div>
    </div>
</div>

<!-- Edit Sales Person Modal -->
<div id="editSalesPersonModal" class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="modal-dialog bg-white rounded-lg shadow-lg p-6">
        <div class="modal-header flex justify-between items-center">
            <h5 class="text-xl font-semibold">Edit Sales Person</h5>
            <button id="closeEditSalesPersonModal" type="button" class="text-gray-600 hover:text-gray-800">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="editSalesPersonForm">
                <input type="hidden" id="editSalesPersonId">
                <div class="mb-4">
                    <label for="editSalesPersonName" class="block text-sm font-medium text-gray-700">Sales Person Name</label>
                    <input type="text" class="mt-1 block w-full px-4 py-2 border rounded-md" id="editSalesPersonName" required>
                </div>
                <div class="mb-4">
                    <label for="editSalesPersonEmail" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" class="mt-1 block w-full px-4 py-2 border rounded-md" id="editSalesPersonEmail" required>
                </div>
                <div class="mb-4">
                    <label for="editSalesPersonPassword" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" class="mt-1 block w-full px-4 py-2 border rounded-md" id="editSalesPersonPassword" required>
                </div>
                <div class="mb-4">
                    <label for="editSalesPersonStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="editSalesPersonStatus" class="mt-1 block w-full px-4 py-2 border rounded-md">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="edit_teamtype" class="block text-sm font-medium text-gray-700">Team Type</label>
                    <select id="edit_teamtype" class="mt-1 block w-full px-4 py-2 border rounded-md">
                        <option value="Seminar">Sales Seminar team</option>
                        <option value="G2B">G2B Team</option>
                        <option value="Franchise">Franchise Team</option>
                        <option value="DigitalIBIV">Digital IBIV Team</option>
                    </select>
                </div>


                <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update Sales Person</button>
            </form>
        </div>
    </div>
</div>

<script>
// Function to display the sales team in the table
function displaySalesTeam(salesTeam) {
    const salesTeamTable = document.getElementById("salesTeamTable");
    salesTeamTable.innerHTML = '';
    salesTeam.forEach((salesPerson, index) => {
        salesTeamTable.innerHTML += `
            <tr class="border-b">
                <td class="py-2 px-4">${index + 1}</td>
                <td class="py-2 px-4">${salesPerson.name}</td>
                <td class="py-2 px-4">${salesPerson.email}</td>
                <td class="py-2 px-4">${salesPerson.password}</td>
                <td class="py-2 px-4">${salesPerson.teamtype}</td>
                <td class="py-2 px-4">${salesPerson.status}</td>
                <td class="py-2 px-4" style="white-space: nowrap;">
                    <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600" onclick="editSalesPerson(${salesPerson.id})">Edit</button>
                    <button class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="deleteSalesPerson(${salesPerson.id})">Delete</button>
                </td>
            </tr>

        `;
    });
}

// Function to fetch sales team data from API using AJAX
function fetchSalesTeam() {
    const baseURL = window.location.origin.includes('localhost') 
      ? '/manav1/manav' // Local environment
      : ''; // Production environment
    $.ajax({
        url: `${baseURL}/saleslist.php`, // Replace with your API URL
        method: 'GET',
        success: function(data) {
            let salesData = JSON.parse(data);
            if (Array.isArray(salesData)) {
                displaySalesTeam(salesData);
            } else {
                console.error('Expected an array, but received:', salesData);
            }
        },
        error: function(error) {
            console.error('Error fetching sales team data:', error);
        }
    });
}

// Function to handle the add sales person form submission using AJAX
$('#addSalesPersonForm').submit(function(e) {
    e.preventDefault();
    const name = $('#salesPersonName').val();
    const email = $('#salesPersonEmail').val();
    const password = $('#salesPersonPassword').val();
    const status = $('#salesPersonStatus').val();
    const teamtype = $('#teamtype').val();
    const baseURL = window.location.origin.includes('localhost') 
      ? '/manav1/manav' // Local environment
      : ''; // Production environment
    $.ajax({
        type: 'POST',
        url: `${baseURL}/salesadd`, // Replace with your API URL
        data: { name, email, password, status,teamtype },
        success: function(response) {
            $('#addSalesPersonModal').addClass('hidden');
            // let salesData = JSON.parse(response);
            // displaySalesTeam(salesData); // Refresh the sales team list
            location.reload();
        },
        error: function(xhr, status, error) {
            console.error('Error adding sales person:', error);
        }
    });
});


$('#editSalesPersonForm').submit(function (e) {
    e.preventDefault();

    // Fetch updated values from the edit form
    const id = $('#editSalesPersonId').val(); // Hidden input to store sales person's ID
    const name = $('#editSalesPersonName').val();
    const email = $('#editSalesPersonEmail').val();
    const password = $('#editSalesPersonPassword').val();
    const status = $('#editSalesPersonStatus').val();
    const edit_teamtype = $('#edit_teamtype').val();
    const baseURL = window.location.origin.includes('localhost') 
      ? '/manav1/manav' // Local environment
      : ''; // Production environment

    $.ajax({

        type: 'POST',
        url: `${baseURL}/salesedit`, // Replace with your edit API URL
        data: { id, name, email, password, status,edit_teamtype },
        success: function (response) {
            $('#editSalesPersonModal').addClass('hidden');
            // let salesData = JSON.parse(response);
            // displaySalesTeam(salesData); // Refresh the sales team list
            location.reload();
        },
        error: function (xhr, status, error) {
            console.error('Error editing sales person:', error);
        }
    });
});



// Function to edit a sales person
function editSalesPerson(id) {
    const baseURL = window.location.origin.includes('localhost') 
      ? '/manav1/manav' // Local environment
      : ''; // Production environment
    $.ajax({
        url: `${baseURL}/salesview?id=${id}`, // Replace with your API URL
        method: 'GET',
        success: function(data) {
            const salesPerson = JSON.parse(data);
            $('#editSalesPersonId').val(salesPerson.id);
            $('#editSalesPersonName').val(salesPerson.name);
            $('#editSalesPersonEmail').val(salesPerson.email);
            $('#editSalesPersonPassword').val(salesPerson.password);
            $('#editSalesPersonStatus').val(salesPerson.status);
            $('#edit_teamtype').val(salesPerson.teamtype);

            $('#editSalesPersonModal').removeClass('hidden');
        }
    });
}

// Function to delete a sales person
function deleteSalesPerson(id) {
    const baseURL = window.location.origin.includes('localhost') 
      ? '/manav1/manav' // Local environment
      : ''; // Production environment
    $.ajax({
        url: `${baseURL}/salesdelete.php?id=${id}`, // Replace with your API URL
        method: 'GET',
        success: function(response) {
            // let salesData = JSON.parse(response);
            // displaySalesTeam(salesData); // Refresh the sales team list
            location.reload();
        }
    });
}

// Show the add sales person modal
$('#openAddSalesPersonModal').click(function() {
    $('#addSalesPersonModal').removeClass('hidden');
});

// Close the add sales person modal
$('#closeAddSalesPersonModal').click(function() {
    $('#addSalesPersonModal').addClass('hidden');
});

// Close the edit sales person modal
$('#closeEditSalesPersonModal').click(function() {
    $('#editSalesPersonModal').addClass('hidden');
});

// Fetch sales team on page load
$(document).ready(function() {
    fetchSalesTeam();
});
</script>
</html>
