<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video Lesson Page</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <link rel="stylesheet" href="output.css"> 
  <style>
    /* Custom animations */
    @keyframes float {
      0% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0); }
    }

    .floating {
      animation: float 3s ease-in-out infinite;
    }

    .highlight {
      background: linear-gradient(90deg, rgba(255,183,77,1) 0%, rgba(255,255,255,1) 50%, rgba(255,183,77,1) 100%);
      background-size: 200% 100%;
      animation: shine 3s linear infinite;
    }

    @keyframes shine {
      0% { background-position: 0% 0%; }
      50% { background-position: 100% 0%; }
      100% { background-position: 0% 0%; }
    }
  </style>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Header -->
  <header class="bg-white shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
      <!-- Logo/Brand -->
      <a href="#" class="text-2xl font-bold text-indigo-600">MyCourse</a>
      
      <!-- Navigation Links -->
      <nav class="space-x-6">
        <a href="#" class="text-gray-700 hover:text-indigo-600 transition">Sign Up</a>
        <a href="#" class="text-gray-700 hover:text-indigo-600 transition">Username</a>
        <a href="#" class="text-gray-700 hover:text-indigo-600 transition">Logout</a>
      </nav>
    </div>
  </header>

  <!-- Main Content Section -->
  <section class="py-12 container mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Video and About the Lesson -->
    <div class="lg:col-span-2">
      <!-- Video Section -->
      <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-8">
        <video id="mainVideo" class="w-full h-80" controls>
          <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        <div class="p-4 highlight">
          <h2 class="text-2xl font-bold text-indigo-600 mb-2">Lesson: Understanding Key Concepts of Web Development</h2>
          <p class="text-gray-700">
            This lesson covers the fundamental principles of web development, providing hands-on examples and interactive sessions to guide you through the learning process.
          </p>
        </div>
      </div>

      <!-- Meet the Coach Section -->
      <div class="bg-white shadow-lg rounded-lg p-6 highlight">
        <h2 class="text-xl font-bold text-indigo-600 mb-4">Meet the Coach</h2>
        <div class="flex items-center">
          <img class="w-16 h-16 rounded-full border-4 border-indigo-500 floating" src="./images/1724738738665.jpeg" alt="Coach Photo">
          <div class="ml-4">
            <p class="text-lg font-bold text-gray-900">Coach: John Doe</p>
            <p class="text-sm text-gray-500">Expert in Web Development</p>
          </div>
        </div>
        <p class="mt-4 text-gray-700">
          John Doe is a seasoned developer with over 10 years of experience in the field. He has mentored hundreds of students, helping them master web technologies.
        </p>
      </div>
    </div>

    <!-- Right-Side Video Thumbnails Section -->
    <div>
      <h3 class="text-2xl font-bold text-gray-800 mb-4">More Lessons</h3>
      <div class="space-y-4 overflow-y-auto h-96">
        <!-- Video Thumbnail 1 -->
        <div class="flex items-center bg-white shadow-md rounded-lg p-3 cursor-pointer hover:bg-indigo-100 transition" onclick="changeVideo('https://www.w3schools.com/html/movie.mp4')">
          <img class="w-16 h-16 object-cover rounded-lg mr-4" src="https://via.placeholder.com/150" alt="Video Thumbnail">
          <div>
            <h4 class="font-bold text-gray-700">HTML Basics</h4>
            <p class="text-sm text-gray-500">Duration: 15 mins</p>
          </div>
        </div>

        <!-- Video Thumbnail 2 -->
        <div class="flex items-center bg-white shadow-md rounded-lg p-3 cursor-pointer hover:bg-indigo-100 transition" onclick="changeVideo('https://www.w3schools.com/html/mov_bbb.mp4')">
          <img class="w-16 h-16 object-cover rounded-lg mr-4" src="https://via.placeholder.com/150" alt="Video Thumbnail">
          <div>
            <h4 class="font-bold text-gray-700">CSS Layouts</h4>
            <p class="text-sm text-gray-500">Duration: 20 mins</p>
          </div>
        </div>

        <!-- Video Thumbnail 3 -->
        <div class="flex items-center bg-white shadow-md rounded-lg p-3 cursor-pointer hover:bg-indigo-100 transition" onclick="changeVideo('https://www.w3schools.com/html/movie.mp4')">
          <img class="w-16 h-16 object-cover rounded-lg mr-4" src="https://via.placeholder.com/150" alt="Video Thumbnail">
          <div>
            <h4 class="font-bold text-gray-700">JavaScript Functions</h4>
            <p class="text-sm text-gray-500">Duration: 25 mins</p>
          </div>
        </div>

        <!-- Video Thumbnail 4 -->
        <div class="flex items-center bg-white shadow-md rounded-lg p-3 cursor-pointer hover:bg-indigo-100 transition" onclick="changeVideo('https://www.w3schools.com/html/mov_bbb.mp4')">
          <img class="w-16 h-16 object-cover rounded-lg mr-4" src="https://via.placeholder.com/150" alt="Video Thumbnail">
          <div>
            <h4 class="font-bold text-gray-700">Advanced JavaScript</h4>
            <p class="text-sm text-gray-500">Duration: 30 mins</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- JavaScript to Change Videos -->
  <script>
    function changeVideo(src) {
      const video = document.getElementById('mainVideo');
      video.src = src;
      video.play();
    }
  </script>

</body>
</html>
