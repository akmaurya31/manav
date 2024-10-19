<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Video Courses</title>
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
  </style>
</head>
<body class="bg-gray-100 font-sans mx-auto w-[1325px]">

     <!-- Header -->
  <header class="bg-blue-200 shadow-md py-4">
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

  <!-- Main Heading Section -->
  <section class="bg-cover bg-center relative rounded-xl" style="background-image: url('images/rectangle_2.png'); ">
   
    <!-- <img src="./images/layer_2.png" class="w-auto" />
    <img src="./images/flag.png" class="w-[45]"  />
    <img src="./images/iss_baar_international_vy.png" /> -->

    <!-- <h1 class="text-4xl font-bold mb-4">Welcome to Your Courses</h1> -->
    <!-- <p class="text-lg">Explore engaging courses by top-notch speakers. Watch the videos and boost your knowledge!</p> -->
  
    <div class="mx-auto relative z-0">
        <div class="relative mx-auto overflow-hidden z-[29] w-[885px]">
        <img class="block mx-auto mt-6" src="images/-.png" alt="बहुत बड़ा बाजार - बहुत बड़ी मार्किट" width="362" height="" title="बहुत बड़ा बाजार - बहुत बड़ी मार्किट">
        <img class="block relative mx-auto mt-1" src="images/image.png" alt="कर रही है आपके प्रोडक्ट्स का इंतज़ार" width="520" height="" title="कर रही है आपके प्रोडक्ट्स का इंतज़ार">
        <img class="block mx-auto mt-3" src="images/flag.png" alt="" width="585" height="">
        <img class="block relative mx-auto mt-3.5" src="images/-_2.png" alt="पूरा संसार - हमारा बाजार" width="595" height="" title="पूरा संसार - हमारा बाजार">
        </div>

        <div class=" flex flex-col  ">
        <div class=" mx-auto ml-10  ">
        <img class=" ml-[101px] mt-[-15px] z-[26]" src="images/vector_smart_object.png" alt="" width="681" height="">

        <img class="block relative mt-6 ml-[151px] z-[24]" src="images/iss_baar_international.png" alt="Iss Baar International" width="700" height="" title="Iss Baar International">
        <img class="block relative mt-5.5 ml-[150px] z-[25]" src="images/vyapaar.png" alt="Vyapaar" width="152" height="" title="Vyapaar">

        <div class="flex flex-wrap mt-7 gap-5 ml-[163px]">
        <!-- <img class="block relative  ml-[89px] z-[27] " src="images/with_dr_manav_ahuja.png" alt="" width="429" height=""> -->

        <div class="flex flex-col text-white border-2px border-[#fff]">
            <p class="transform font-extrabold leading-tight">
                <span class="text-[41.62px] font-light">Dr Manav Ahuja</span> 
            </p>
            <p class="text-[21px]" >Founder & CEO  TPEG International, Dubai</p>
        </div> 


     


    </div></div>
    </div>
    </div>



</section>

  <!-- Video Cards Section -->
  <section class="py-12 container mx-auto px-4">
    <div class="grid gap-8 lg:grid-cols-2">
      <!-- Video Card 1 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition duration-500">
        <div class="relative">
          <img class="w-full h-48 object-cover" src="./images/1725885536324.jpeg" alt="Video Thumbnail">
          <div class="  bottom-0 left-0 bg-slate-900 w-full p-4 text-white">
            <h2 class="text-xl font-bold">Thrilled to share my mission in this 3-minute video! </h2>
            <p class="mt-2 text-sm">As a CEO Coach and Business Strategist, I'm dedicated to transforming businesses and guiding sales teams to surpass targets. 
                Join me as I empower Indian SMEs to expand globally. 
                Let's chart a path to unparalleled success together! 🚀💼</p>
          </div>
        </div>
        <div class="p-4">
          <div class="flex items-center mb-4">
            <img class="w-12 h-12 rounded-full border-2 border-indigo-500 floating" src="./images/1724738738665.jpeg    " alt="Author Photo">
            <div class="ml-4">
              <p class="text-sm text-gray-700 font-semibold">Keynoter: Dr Manav Ahuja</p>
              <p class="text-xs text-gray-500">Duration: 45 mins</p>
            </div>
          </div>
          <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300">View Now</button>
        </div>
      </div>

      <!-- Video Card 2 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition duration-500">
        <div class="relative">
          <img class="w-full h-48 object-cover" src="./images/1725885536324.jpeg" alt="Video Thumbnail">
          <div class="  bottom-0 left-0 bg-slate-900 w-full p-4 text-white">
            <h2 class="text-xl font-bold">Thrilled to share my mission in this 3-minute video! </h2>
            <p class="mt-2 text-sm">As a CEO Coach and Business Strategist, I'm dedicated to transforming businesses and guiding sales teams to surpass targets. 
                Join me as I empower Indian SMEs to expand globally. 
                Let's chart a path to unparalleled success together! 🚀💼</p>
          </div>
        </div>
        <div class="p-4">
          <div class="flex items-center mb-4">
            <img class="w-12 h-12 rounded-full border-2 border-indigo-500 floating" src="./images/1724738738665.jpeg    " alt="Author Photo">
            <div class="ml-4">
              <p class="text-sm text-gray-700 font-semibold">Keynoter: Dr Manav Ahuja</p>
              <p class="text-xs text-gray-500">Duration: 45 mins</p>
            </div>
          </div>
          <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300">View Now</button>
        </div>
      </div>

      <!-- Video Card 3 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition duration-500">
        <div class="relative">
          <img class="w-full h-48 object-cover" src="./images/1725885536324.jpeg" alt="Video Thumbnail">
          <div class="  bottom-0 left-0 bg-slate-900 w-full p-4 text-white">
            <h2 class="text-xl font-bold">Thrilled to share my mission in this 3-minute video! </h2>
            <p class="mt-2 text-sm">As a CEO Coach and Business Strategist, I'm dedicated to transforming businesses and guiding sales teams to surpass targets. 
                Join me as I empower Indian SMEs to expand globally. 
                Let's chart a path to unparalleled success together! 🚀💼</p>
          </div>
        </div>
        <div class="p-4">
          <div class="flex items-center mb-4">
            <img class="w-12 h-12 rounded-full border-2 border-indigo-500 floating" src="./images/1724738738665.jpeg" alt="Author Photo">
            <div class="ml-4">
              <p class="text-sm text-gray-700 font-semibold">Keynoter: Dr Manav Ahuja</p>
              <p class="text-xs text-gray-500">Duration: 45 mins</p>
            </div>
          </div>
          <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300">View Now</button>
        </div>
      </div>

      <!-- Video Card 4 -->
      <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition duration-500">
        <div class="relative">
          <img class="w-full h-48 object-cover" src="./images/1725885536324.jpeg" alt="Video Thumbnail">
          <div class="  bottom-0 left-0 bg-slate-900 w-full p-4 text-white">
            <h2 class="text-xl font-bold">Thrilled to share my mission in this 3-minute video! </h2>
            <p class="mt-2 text-sm">As a CEO Coach and Business Strategist, I'm dedicated to transforming businesses and guiding sales teams to surpass targets. 
                Join me as I empower Indian SMEs to expand globally. 
                Let's chart a path to unparalleled success together! 🚀💼</p>
          </div>
        </div>
        <div class="p-4">
          <div class="flex items-center mb-4">
            <img class="w-12 h-12 rounded-full border-2 border-indigo-500 floating" src="./images/1724738738665.jpeg    " alt="Author Photo">
            <div class="ml-4">
              <p class="text-sm text-gray-700 font-semibold">Keynoter: Dr Manav Ahuja</p>
              <p class="text-xs text-gray-500">Duration: 45 mins</p>
            </div>
          </div>
          <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300">View Now</button>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
