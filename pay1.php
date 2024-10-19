<?php //require_once("header.php"); ?>
<script src="https://cdn.tailwindcss.com"></script>
<div class="container mx-auto min-h-[500px] w-[80%]">
  <div class="w-full">
  </div>

  <div class="container mx-auto ">
    <div class="flex flex-col lg:flex-row  gap-5 pt-5">

      <div class="w-full lg:w-2/3">
        <div class="bg-white shadow-md rounded-lg mb-6">
          <div class="bg-gray-200 px-4 py-3 rounded-t-lg font-semibold">Order Process</div>
          <div class="p-6">
            <form action="process.php" method="POST" id="paymentForm">

              <!-- Customer Details -->
              <div class="mb-6">
                <h4 class="text-center text-lg font-semibold mb-4">Customer Details</h4>
                
                <div class="mb-4">
                  <label class="block font-bold mb-1">Card Holder Name <span class="text-red-500">*</span></label>
                  <input type="text" name="customerName" id="customerName" class="form-input w-full border border-gray-300 rounded px-3 py-2" value="">
                  <span id="errorCustomerName" class="text-red-500 text-sm"></span>
                </div>

                <div class="mb-4">
                  <label class="block font-bold mb-1">Email Address <span class="text-red-500">*</span></label>
                  <input type="text" name="emailAddress" id="emailAddress" class="form-input w-full border border-gray-300 rounded px-3 py-2" value="">
                  <span id="errorEmailAddress" class="text-red-500 text-sm"></span>
                </div>

                <div class="mb-4">
                  <label class="block font-bold mb-1">Mobile <span class="text-red-500">*</span></label>
                  <input type="text" name="customerMobile" id="customerMobile" class="form-input w-full border border-gray-300 rounded px-3 py-2" value="">
                  <span id="errorCustomerMobile" class="text-red-500 text-sm"></span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <div class="mb-4">
                    <label class="block font-bold mb-1">City <span class="text-red-500">*</span></label>
                    <input type="text" name="customerCity" id="customerCity" class="form-input w-full border border-gray-300 rounded px-3 py-2" value="">
                    <span id="errorCustomerCity" class="text-red-500 text-sm"></span>
                  </div>

                  <div class="mb-4">
                    <label class="block font-bold mb-1">Country <span class="text-red-500">*</span></label>
                    <input type="text" name="customerCountry" id="customerCountry" class="form-input w-full border border-gray-300 rounded px-3 py-2">
                    <span id="errorCustomerCountry" class="text-red-500 text-sm"></span>
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <!-- Payment Details -->
              <div class="mb-6">
                <h4 class="text-center text-lg font-semibold mb-4">Payment Details</h4>

                <div class="mb-4">
                  <label class="block font-bold mb-1">Card Number <span class="text-red-500">*</span></label>
                  <input type="text" name="cardNumber" id="cardNumber" class="form-input w-full border border-gray-300 rounded px-3 py-2" placeholder="1234 5678 9012 3456" maxlength="20">
                  <span id="errorCardNumber" class="text-red-500 text-sm"></span>
                </div>

                <div class="grid grid-cols-3 gap-4">
                  <div class="mb-4">
                    <label class="block font-bold mb-1">Expiry Month</label>
                    <input type="text" name="cardExpMonth" id="cardExpMonth" class="form-input w-full border border-gray-300 rounded px-3 py-2" placeholder="MM" maxlength="2">
                    <span id="errorCardExpMonth" class="text-red-500 text-sm"></span>
                  </div>

                  <div class="mb-4">
                    <label class="block font-bold mb-1">Expiry Year</label>
                    <input type="text" name="cardExpYear" id="cardExpYear" class="form-input w-full border border-gray-300 rounded px-3 py-2" placeholder="YYYY" maxlength="4">
                    <span id="errorCardExpYear" class="text-red-500 text-sm"></span>
                  </div>

                  <div class="mb-4">
                    <label class="block font-bold mb-1">CVC</label>
                    <input type="text" name="cardCVC" id="cardCVC" class="form-input w-full border border-gray-300 rounded px-3 py-2" placeholder="123" maxlength="4">
                    <span id="errorCardCvc" class="text-red-500 text-sm"></span>
                  </div>
                </div>
              </div>

              <div class="text-center">
                <input type="hidden" name="price" id="price" value="499">
                <input type="hidden" name="total_amount" value="499">
                <input type="hidden" name="currency_code" value="INR">
                <input type="hidden" name="item_details" value="International Business Expansion Summit - Master Class">
                <input type="hidden" name="item_number" value="TS1234567">
                <input type="hidden" name="order_number" value="SKA987654321">
                <input type="button" name="payNow" id="payNow" class="btn bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" onclick="stripePay(event)" value="Pay Now" />
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Order Details Section -->
      <div class="w-full lg:w-1/3">
        <div class="bg-white shadow-md rounded-lg">
          <h4 class="text-center text-lg font-semibold py-3 bg-gray-200 rounded-t-lg">Order Details</h4>
          <div class="p-6">
            <div class="table-responsive">
              <table class="table-auto w-full border-collapse">
                <thead>
                  <tr class="border-b">
                    <th class="text-left p-2">Product Name</th>
                    <th class="text-left p-2">Quantity</th>
                    <th class="text-right p-2">Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="border-b">
                    <td class="p-2"><strong>International Business Expansion Summit - Master Class</strong></td>
                    <td class="p-2">1</td>
                    <td class="text-right p-2">Rs. 499.00</td>
                  </tr>
                  <tr>
                    <td colspan="2" class="text-right p-2">Total</td>
                    <td class="text-right p-2"><strong>Rs. 499.00</strong></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="insert-post-ads1 mt-6"></div>
