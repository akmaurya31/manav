<?php include("header.php"); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
  <!-- Container for the form -->
  <div class="container mx-auto mt-5 max-w-[500px] p-2 bg-white rounded-lg shadow-lg">
  <!-- Container for the form -->
  <!-- <div class="w-[40%] p-6 bg-white rounded-lg shadow-lg"> -->
    <!-- Form header -->
    <div class="text-center mb-2">
      <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">
        🔑 Sign In IBIV - Digital
      </h3>

     
    </div>

    <!-- Form body -->
    <div class="p-1">
    <form action="addLogin" method="post" name="add" class="space-y-4 bg-white p-2 shadow-lg rounded-lg">
  <!-- Username (Email/Mobile) Field -->
  <div class="flex flex-col md:flex-row md:items-center">
    <label for="username" class="w-40 text-sm font-medium text-gray-900 dark:text-white">📧 Email/Mobile *</label>
    <input type="text" name="username" id="username" placeholder="Email or Mobile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex-1 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
  </div>

  <!-- Password Field -->
  <div class="flex flex-col md:flex-row md:items-center">
    <label for="password" class="w-40 text-sm font-medium text-gray-900 dark:text-white">🔒 Password *</label>
    <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 flex-1 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
  </div>

  <!-- Remember Me and Forgot Password -->
  <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 hidden">
    <div class="flex flex-col md:flex-row md:items-center">
      <input id="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-600 dark:border-gray-500 dark:focus:ring-blue-600" />
      <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
    </div>
    <a href="#" class="text-sm text-blue-700 hover:underline dark:text-blue-500">🔑 Lost Password?</a>
  </div>

  <!-- Sign In Button -->
  <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">🚪 Sign In</button>

  <!-- Not registered link -->
  <div class="text-sm font-medium text-gray-500 dark:text-gray-300 mt-4 text-center">
    Not registered? <a href="signup" class="text-blue-700 hover:underline dark:text-blue-500">🌟 Create account</a>
  </div>
</form>

    </div>
  </div>
</body>
</html>
