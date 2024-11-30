<?php require_once("headerk.php");


//   print_r($_SESSION);
// die("ASdf");
?>
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
            /* max-width: 800px; */
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
    
    <style>
        body {
            background-color:#333;
            font-family: Arial, sans-serif;
            color: #fff;
            padding: 20px;
        }

        .form-section {
            background-color: rgba(0, 0, 0, 0.5);
            margin: 15px 0;
            padding: 20px;
            border-radius: 8px;
        }

        .form-section legend {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #f0f0f0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #f0f0f0;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #fff;
            border-radius: 5px;
            font-size: 1em;
            color: #333;
            background-color: #fff;
        }

        .form-group input[type="number"] {
            -moz-appearance: textfield;
        }

        .form-actions button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            width: 100%;
        }

        .form-actions button:hover {
            background-color: #218838;
        }

        fieldset {
            border: none;
        }

        .form-group input[type="file"] {
            border: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-section {
                padding: 15px;
            }

            .form-actions button {
                font-size: 1em;
            }
        }
    </style>
 
 <div class="flex items-center justify-center mx-auto">

    <form action="saleFormAdd" method="POST" enctype="multipart/form-data">
        <!-- Customer Information Section -->
        <fieldset class="form-section ">
            <legend>Customer Information</legend>
            
            <?php if(in_array('religion', $_SESSION['access_fields'])) {  ?>
            <div class="form-group">
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
        </fieldset>

        <!-- Product & Seller Information Section -->
        <fieldset class="form-section">
            <legend>Product & Seller Information</legend>
            
            <div class="form-group">
                <label for="product">Product</label>
                <select id="product" name="product" required>
                    <option value="" disabled selected>Select Product</option>
                </select>
            </div>

            <div class="form-group">
                <label for="seller">Seller Name</label>
                <input type="text" id="seller" name="seller" placeholder="Enter Seller Name" value="<?php echo $_SESSION['name']; ?>" required>
            </div>
        </fieldset>

        <!-- Payment Details Section -->
        <fieldset class="form-section">
            <legend>Payment Details</legend>
            
            <div class="form-group">
    <label for="paymentType">Types of Payment</label>
    <select id="paymentType" name="paymentType" required>
        <option value="">Select Payment Type</option>
        <option value="token">First Payment</option>
        <option value="recovery">Recovery</option>
        <option value="installments">Installments</option>
        <option value="full">Full Payment</option>
        <option value="final">Final Payment</option>
    </select>
</div>

<div class="form-group">
    <label for="bankType">Types of Bank</label>
    <select id="bankType" name="bankType" required>
        <option value="">Select Bank Type</option>
        <option value="manav">Manav Ahuja A/C</option>
        <option value="cash">Cash/UPI/Cheque</option>
        <option value="dubai">Dubai Payment</option>
        <option value="planofy">PlanofyAcGST</option>
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
        </fieldset>

        <!-- Additional Information Section -->
        <fieldset class="form-section">
            <legend>Additional Information</legend>
            
            <?php if(in_array('ticket', $_SESSION['access_fields'])) {  ?>
            <div class="form-group">
                <label for="tickets">No. of Tickets</label>
                <input type="number" id="tickets" name="tickets" placeholder="Enter Number of Tickets">
            </div>
            <?php } ?>

            <?php if(in_array('company_name', $_SESSION['access_fields'])) { ?>
            <div class="form-group">
                <label for="company_name">Company Name</label>
                <input type="text" id="company_name" name="company_name" placeholder="Enter Company Name">
            </div>
            <?php } ?>

            <?php if(in_array('proposed_amount', $_SESSION['access_fields'])) { ?>
            <div class="form-group">
                <label for="proposed_amount">Proposed Amount</label>
                <input type="number" id="proposed_amount" name="proposed_amount" placeholder="Enter Proposed Amount">
            </div>
            <?php } ?>

            <?php if(in_array('currency', $_SESSION['access_fields'])) { ?>
            <div class="form-group">
                <label for="currency">Currency</label>
                <select id="currency" name="currency" class="form-control">
                    <option value="INR">INR</option>
                    <option value="AED">AED</option>
                    <option value="LKR">LKR</option>
                    <option value="USD">USD</option>
                </select>
            </div>
            <?php } ?>

            <div class="form-group">
                <label for="gstfile">Payment Slip</label>
                <input type="file" id="screenshot" name="screenshot">
            </div>
        </fieldset>

        <!-- GST Section -->
        <?php if(in_array('gst_no', $_SESSION['access_fields'])) { ?>
        <fieldset class="form-section">
            <legend>GST Details</legend>
            
            <div class="form-group">
                <label for="gstApplicable">GST Applicable</label>
                <select id="gstApplicable" name="gstApplicable" required>
                    <option value="" disabled selected>Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gstPercentage">GST Percentage</label>
                <input type="number" id="gstPercentage" name="gstPercentage" placeholder="Enter GST Percentage">
            </div>

            <div class="form-group">
                <label for="gstAmount">GST Amount</label>
                <input type="number" id="gstAmount" name="gstAmount" placeholder="Enter GST Amount">
            </div>

            <div class="form-group">
                <label for="gstfile">GST File</label>
                <input type="file" id="gstfile" name="gstfile">
            </div>
        </fieldset>
        <?php } ?>

        <div class="form-actions">
            <button type="submit">Submit Form</button>
        </div>
    </form>
        </div>
 


</body>
</html>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    // Function to fetch product data using Fetch API
    function populateProductDropdown() {
        const baseURL = window.location.origin.includes('localhost') 
      ? '/manav1/manav' // Local environment
      : ''; // Production environment

        fetch(`${baseURL}/productslist`)  // Replace with your actual API URL
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