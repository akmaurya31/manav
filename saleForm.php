<?php require_once("headerk.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .form-group {
            flex: 1 1 calc(50% - 20px); /* Two columns */
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, select, textarea {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            resize: none;
        }
        .form-actions {
            flex: 1 1 100%; /* Full width for buttons */
            text-align: center;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #45a049 !important;
            /* background-color: #4CAF50; */
            /* color: white; */
            /* border: none; */
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Customer Information Form</h2>
    <form action="saleFormAdd" method="POST" enctype="multipart/form-data">
      
       <?php if(isset($_SESSION['visiblity']) && $_SESSION['visiblity']==1){ ?> <div class="form-group">
            <label for="religion">Customer's Religion</label>
            <select id="religion" name="religion" required>
                <option value="">Select Religion</option>
                <option value="Hindu">Hindu</option>
                <option value="Muslim">Muslim</option>
                <option value="Christian">Christian</option>
                <option value="Sikh">Sikh</option>
                <option value="Others">Others</option>
            </select>
        </div>
        <?php } ?>

        <div class="form-group">
            <label for="product">Product</label>
            <select id="product" name="product" required>
             <option value="" disabled selected>Select Product</option>
                 </select>
        </div>

        <div class="form-group">
            <label for="name">Customer Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Customer Name" required>
        </div>

        <div class="form-group">
            <label for="phone">Customer Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number" required>
        </div>

        <div class="form-group">
            <label for="email">Customer Email ID</label>
            <input type="email" id="email" name="email" placeholder="Enter Email ID" required>
        </div>

        <div class="form-group">
            <label for="location">Customer Location</label>
            <input type="text" id="location" name="location" placeholder="Enter Location" required>
        </div>

        <div class="form-group">
            <label for="business">Customer's Business Industry</label>
            <input type="text" id="business" name="business" placeholder="Enter Business Industry" required>
        </div>

     

        <div class="form-group">
            <label for="seller">Seller Name</label>
            <input type="text" id="seller" name="seller" placeholder="Enter Seller Name" required>
        </div>

        <div class="form-group">
            <label for="paymentType">Types of Payment</label>
            <select id="paymentType" name="paymentType" required>
                <option value="">Select Payment Type</option>
                <option value="Full Payment">Full Payment</option>
                <option value="Installments">Installments</option>
            </select>
        </div>

        <div class="form-group">
            <label for="paymentMode">Mode of Payment</label>
            <select id="paymentMode" name="paymentMode" required>
                <option value="">Select Mode of Payment</option>
                <option value="Cash">Cash</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="UPI">UPI</option>
                <option value="Net Banking">Net Banking</option>
            </select>
        </div>

        <div class="form-group">
            <label for="paid">Amount Paid</label>
            <input type="number" id="paid" name="paid" placeholder="Enter Paid Amount" required>
        </div>

        <div class="form-group">
            <label for="pending">Amount Pending</label>
            <input type="number" id="pending" name="pending" placeholder="Enter Pending Amount">
        </div>

        <div class="form-group">
            <label for="tickets">No. of Tickets</label>
            <input type="number" id="tickets" name="tickets" placeholder="Enter Number of Tickets">
        </div>

        <div class="form-group">
            <label for="remark">Remark (Franchise Activation)</label>
            <textarea id="remark" name="remark" rows="3" placeholder="Enter Remark"></textarea>
        </div>

        <div class="form-group">
            <label for="paymentID">Payment ID</label>
            <input type="text" id="paymentID" name="paymentID" placeholder="Enter Payment ID">
        </div>

        
        <div class="form-group">
            <label for="gstApplicable">GST Applicable</label>
            <select id="gstApplicable" name="gstApplicable" required>
                <option value="" disabled selected>Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <!-- Container for dynamically added fields -->
     
            <div class="form-group">
                <label for="gstPercentage">GST Percentage</label>
                <input type="number" id="gstPercentage" name="gstPercentage" placeholder="Enter GST Percentage">
            </div>
            <div class="form-group">
                <label for="gstAmount">GST Amount</label>
                <input type="number" id="gstAmount" name="gstAmount" placeholder="Enter GST Amount">
            </div>
      



        <div class="form-group">
            <label for="screenshot">Payment Screenshot</label>
            <input type="file" id="screenshot" name="screenshot" accept="image/*">
        </div>

        <div class="form-actions">
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    // Function to fetch product data using Fetch API
    function populateProductDropdown() {
        fetch('/manav1/manav/productslist')  // Replace with your actual API URL
            .then(response => response.json())  // Parse the response as JSON
            .then(data => {
                const productDropdown = document.getElementById('product');
                
                // Clear existing options
                productDropdown.innerHTML = '<option value="" disabled selected>Select Product</option>';
                // let data1=JSON.parse(data);
                // console.log(data1,"data1data1data1data1")
                
                // Loop through the data and populate the dropdown
                data.forEach(product => {
                    const option = document.createElement('option');
                    option.value = product.id;
                    option.textContent = product.product_name;
                    productDropdown.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching products:', error);
                // Optionally, handle errors or show a message to the user
            });
    }

    // Call the function to fetch and populate the dropdown
    populateProductDropdown();
});


</script>