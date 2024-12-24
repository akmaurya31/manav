<?php include("headerk.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form - Digital Master Class</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold text-center mb-6">Feedback Form</h1>

    <?php 
    $id = $_REQUEST['id'];

    $international_vyapaar_topics = [
        1 => [
            "title" => "Why To Do International Vyapaar",
            "description" => "Learn the benefits of expanding your business globally, including access to larger markets, increased profits, and opportunities to grow your brand internationally.",
            "link"=>"https://publictpeg.s3.ap-south-1.amazonaws.com/ibiv/241006IBIVVideo1WhytodoInternationalBusiness.mp4"
        ],
        2 => [
            "title" => "How To Do International Vyapaar",
            "description" => "Get step-by-step guidance on establishing your international business, from finding buyers to setting up supply chains and handling logistics efficiently.",
             "link"=>"https://publictpeg.s3.ap-south-1.amazonaws.com/ibiv/241006IBIVVideo2HowtodoInternationalBusiness.mp4" 
        ],
        3 => [
            "title" => "International Vyapaar - Government Rules and Compliances",
            "description" => "Understand the essential export-import regulations, compliance requirements, and legal frameworks to ensure smooth international trading.",
            "link"=>"https://publictpeg.s3.ap-south-1.amazonaws.com/ibiv/24-09-26IBIVVideo3-Governmentrulescomplnces.mp4.mp4"
        ],
        4 => [
            "title" => "How TPEG Helps You in Doing International Vyapaar",
            "description" => "Explore how TPEG provides tailored support for Indian SMEs through buyer connections, market access, and end-to-end trade solutions.",
            "link"=>"https://publictpeg.s3.ap-south-1.amazonaws.com/ibiv/241006IBIVVideo4HowTPEGHELPSyouindoinginternationalvyapaar.mp4"
        ],
        5 => [
            "title" => "How to Start International Vyapaar in Dubai – UAE",
            "description" => "Unlock the potential of Dubai as a global business hub, and learn the specific steps to establish your presence in the UAE’s thriving international trade market.",
            "link"=>"https://publictpeg.s3.ap-south-1.amazonaws.com/ibiv/241006IBIVVideo5HowtoStartInternationalvyapaarindubaiuae.mp4"
        ]
    ];
    
    ?>

    

    <form action="feedback_save" method="post" class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg grid gap-6">
        
    <b> Feedback For : <?php  echo $international_vyapaar_topics[$id]['title']; ?> </b>

    

    <input type="hidden" id="video_id" name="video_id" value="<?php echo $id ?>" ?> 
    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['idd'] ?>" ?> 

        <!-- Full width field -->
        <div class="col-span-2">
            <label for="name" class="block text-sm font-medium text-gray-700">1. Your Name</label>
            <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter your name" value="<?php echo $_SESSION['name'] ?>" required>
        </div>

        <!-- Two-column fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="mobile" class="block text-sm font-medium text-gray-700">2. Your Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter your mobile number" value="<?php echo $_SESSION['mobile'] ?>" required>
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">3. Your City</label>
                <input type="text" id="city" name="city" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter your city" value="<?php echo $_SESSION['city'] ?>"  required>
            </div>
        </div>

        <!-- Full width field -->
        <div class="col-span-2">
            <label for="business" class="block text-sm font-medium text-gray-700">4. Your Business</label>
            <input type="text" id="business" name="business" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Enter your business"  value="<?php echo $_SESSION['yourbusiness'] ?>"  required>
        </div>

        <!-- Mark Video Completion -->
<div class="col-span-2">
    <label class="block text-sm font-medium text-gray-700">
        Mark Video Completion
    </label>
    <div class="flex items-center space-x-6 mt-1">
        <label class="flex items-center space-x-2">
            <input type="radio" name="markCompleted" value="25" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" required>
            <span class="text-gray-700">25%</span>
        </label>
        <label class="flex items-center space-x-2">
            <input type="radio" name="markCompleted" value="50" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
            <span class="text-gray-700">50%</span>
        </label>
        <label class="flex items-center space-x-2">
            <input type="radio" name="markCompleted" value="75" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
            <span class="text-gray-700">75%</span>
        </label>
        <label class="flex items-center space-x-2">
            <input type="radio" name="markCompleted" value="100" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
            <span class="text-gray-700">100%</span>
        </label>
    </div>
</div>


        <!-- Two-column fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700">5. How did you like the Master Class? (Rating from 1 to 10)</label>
                <select id="rating" name="rating" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    <option value="">Select Rating</option>
                    <option value="1">1 - Poor</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5 - Average</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10 - Excellent</option>
                </select>
            </div>

            <div>
                <label for="tpeg" class="block text-sm font-medium text-gray-700">8. Would you like to get 100% Guaranteed International Orders by TPEG?</label>
                <select id="tpeg" name="tpeg" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    <option value="">Select Yes or No</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>

        <!-- Full width field -->
        <div class="col-span-2">
            <label for="learned" class="block text-sm font-medium text-gray-700">6. Top 3 things you learned from this Master-Class</label>
            <textarea id="learned" name="learned" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Write the top 3 things you learned" required></textarea>
        </div>

        <div class="col-span-2">
            <label for="improvement" class="block text-sm font-medium text-gray-700">7. Areas of Improvement in this Master-Class</label>
            <textarea id="improvement" name="improvement" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Write areas of improvement" required></textarea>
        </div>

        <div class="col-span-2">
            <label for="comments" class="block text-sm font-medium text-gray-700">9. Comment / Suggestion</label>
            <textarea id="comments" name="comments" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Share your comments or suggestions"></textarea>
        </div>

        <!-- Submit button -->
        <div class="col-span-2">
            <button type="submit" class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded hover:bg-green-700">Submit Feedback</button>
        </div>
    </form>
</body>
</html>
