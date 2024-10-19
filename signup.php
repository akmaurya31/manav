 <?php include("header.php"); ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
  <!-- Container for the form -->
  <div class="container mx-auto mt-5 max-w-[500px] p-2 bg-white rounded-lg shadow-lg">
    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white text-center mb-2">📝 Sign Up  IBIV - Digital</h3>

    <form class="space-y-4 bg-white p-2 shadow-lg rounded-lg" action="addAction" method="post" name="add">
  <!-- Name Field -->
  <div class="flex flex-col md:flex-row md:items-center">
    <label for="name" class="w-32 text-sm font-medium text-gray-800">👤 Name *</label>
    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex-1 p-2.5" placeholder="Enter your name" required />
  </div>

  <!-- Mobile Field -->
  <div class="flex flex-col md:flex-row md:items-center">
    <label for="mobile" class="w-32 text-sm font-medium text-gray-800">📱 Mobile *</label>
    <input type="text" name="mobile" id="mobile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex-1 p-2.5" placeholder="Enter your mobile number" required />
  </div>

  <!-- Email Field -->
  <div class="flex flex-col md:flex-row md:items-center">
    <label for="email" class="w-32 text-sm font-medium text-gray-800">📧 Email *</label>
    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex-1 p-2.5" placeholder="Enter your email" required />
  </div>

  <!-- City Field -->
  <div class="flex flex-col md:flex-row md:items-center">
    <label for="city" class="w-32 text-sm font-medium text-gray-800">🏙️ City *</label>
    <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex-1 p-2.5" placeholder="Enter your city" required />
  </div>

  <!-- State Field -->
  <div class="flex flex-col md:flex-row md:items-center">
    <label for="state" class="w-32 text-sm font-medium text-gray-800">🌍 State *</label>
    <input type="text" name="state" id="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex-1 p-2.5" placeholder="Enter your state" required />
  </div>

  <!-- Business Field -->
  <div class="flex flex-col md:flex-row md:items-center">
    <label for="business" class="w-32 text-sm font-medium text-gray-800">💼 Business *</label>
    <input type="text" name="business" id="business" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex-1 p-2.5" placeholder="Enter your business type" required />
  </div>

  <!-- Password Field -->
  <div class="flex flex-col md:flex-row md:items-center">
    <label for="password" class="w-32 text-sm font-medium text-gray-800">🔒 Password *</label>
    <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex-1 p-2.5" placeholder="Create a password" required />
  </div>

  <!-- Signup Button -->
  <button type="submit" name="submit" class="w-full text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">✍️ Sign Up</button>

  <!-- Already Registered -->
  <div class="text-sm font-medium text-gray-500 text-center">
    Already registered? <a href="login" class="text-blue-700 hover:underline">Login here</a>
  </div>
</form>

  </div>
  <script>
function validateMobile(input) {
    // Get the current value of the input
    let value = input.value;

    // Remove any non-digit characters
    value = value.replace(/\D/g, ''); // Removes all non-digit characters

    // Remove leading zero if present
    if (value.startsWith('0')) {
        value = value.slice(1); // Remove the first character
    }

    // Update the input value
    input.value = value;
}
</script>


</body>
</html>




  
