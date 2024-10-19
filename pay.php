<?php require_once("headerk.php"); ?>
<div class="container w-[80%] mx-auto py-12">
    



<div class="flex flex-col md:flex-row bg-white p-6 border border-gray-300 rounded-lg shadow-lg max-w-4xl mx-auto gap-4 ">
  <!-- Left side (Image) -->
  <div class=" flex justify-center items-center">
    <img src="./images/payleft.jpeg" alt="Dr. Manav Ahuja" class="rounded-lg max-w-[150px]" style="width: 330px;">
  </div>

  <!-- Right side (Text) -->
  <div class=" md:pl-8 mt-6 md:mt-0 ml-2">
    <h2 class="text-2xl font-bold text-gray-800 mb-2">Join Master Class on</h2>
    <h3 class="text-xl font-semibold text-blue-600 mb-2">Iss Baar International Vyapaar - Digital</h3>
    <p class="text-lg font-medium text-red-500 mb-2">Rs. 490/- only</p>
    <p class="text-lg text-gray-700 mb-2">For Indian Businessmen and Businesswomen</p>
    <p class="text-lg font-semibold text-gray-800 mb-4">Learn - Earn - Grow</p>
    
    <!-- Instructor Info -->
    <p class="text-lg text-gray-700 mb-2">With <strong>Dr. Manav Ahuja</strong></p>
    <p class="text-gray-500">Founder, CEO - TPEG International LLC, Dubai</p>

    <!-- CTA Button -->
    <hr class="w-1/4 border-red-500 mx-auto mt-4 ">
            <form action="./stripe/public/checkout" method="POST">
             <!-- <form action="https://buy.stripe.com/8wMcPm1FUdbf7vy7sB" method="get">  -->
                <button type="submit" id="checkout-button" class="bg-blue-500 text-white rounded-full px-4 py-2 mt-4 hover:bg-blue-600">
                    Pay Now
                </button>

                <button type="button" class="bg-green-500 text-white rounded-full px-4 py-2 mt-4 hover:bg-blue-600" onclick="document.getElementById('exampleModal').classList.remove('hidden');">
                    Via UPI QR
                </button>
            </form>

    <!-- <a href="#" class="inline-block mt-6 bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition">Join Now</a> -->
  </div>
</div>


<div class="bg-gray-100 border border-2px p-6 rounded-lg shadow-lg max-w-4xl mx-auto mt-8">
  <h2 class="text-2xl font-bold text-gray-800 mb-4">Dear Participant,</h2>
  <p class="text-lg text-gray-700 mb-4">
  Once You make the Payment through UPI – Please send the payment Screenshot to  
   

  <!-- Highlighted WhatsApp Number -->
  <span class="text-lg font-semibold text-green-600 mb-4">
    WhatsApp Number: <a href="https://wa.me/919999027340" class="underline">+91- 9999027340</a>
  </span>

  <span class="text-lg text-gray-700 mb-4">
  and We will send the Login Details to Watch IBIV – Digital Master Class within 12 hours. 
  </span>

  <span class="text-lg font-medium text-gray-800">Thanks!</span> </p>
</div>





<div
  class="fixed border inset-0 z-[11055] hidden h-full w-full overflow-y-auto  bg-opacity-50"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="relative flex items-center justify-center min-h-screen p-4">
    <div class="relative w-full max-w-lg transform overflow-hidden rounded-lg bg-white shadow-xl transition-all">
      <!-- Modal Header -->
      <div class="flex items-center justify-between p-4 border-b border-gray-300">
        <h5 class="text-xl font-medium text-gray-800" id="exampleModalLabel">
          Pay Now
        </h5>
        <button
          type="button"
          class="text-gray-500 hover:text-gray-800 focus:outline-none"
          aria-label="Close"
          onclick="document.getElementById('exampleModal').classList.add('hidden');">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Modal Body -->
      <div class="p-4">
        <!-- Your image or content here -->
        <img src="images/payment.jpg" class="w-[60%] h-[50%]" alt="Payment Screenshot" />

        <div class="bg-gray-100 border border-2px p-6 rounded-lg shadow-lg max-w-4xl mx-auto mt-8">
  <h2 class="text-2xl font-bold text-gray-800 mb-4">Dear Participant,</h2>
  <p class="text-lg text-gray-700 mb-4">
  Once You make the Payment through UPI – Please send the payment Screenshot to  
   

  <!-- Highlighted WhatsApp Number -->
  <span class="text-lg font-semibold text-green-600 mb-4">
    WhatsApp Number: <a href="https://wa.me/919999027340" class="underline">+91- 9999027340</a>
  </span>

  <span class="text-lg text-gray-700 mb-4">
  and We will send the Login Details to Watch IBIV – Digital Master Class within 12 hours. 
  </span>

  <span class="text-lg font-medium text-gray-800">Thanks!</span> </p>
</div>



      </div>

      <!-- Modal Footer -->
      <div class="flex justify-end p-4 border-t border-gray-300">
        
        
      </div>
    </div>
  </div>
</div>

</div>

<?php require_once("footer.php");?>
