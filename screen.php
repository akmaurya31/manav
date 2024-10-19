    <script>
        // Function to determine if the view is mobile or desktop
        function setView() {
            const width = window.innerWidth; // Get the viewport width
            const width1 = document.documentElement.clientWidth;
            let view = 'desktop'; // Default view

            if (width1 <= 768) { // Change this breakpoint as needed
                view = 'mobile';
            }
          //  alert(width1);
           // alert(view);

            

            // Send the view type to the server using AJAX
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'set_view', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText); // Handle response if needed
                }
            };
            xhr.send('view=' + view); // Send the view variable
        }

        // Call the function when the page loads
        window.onload = setView;
    </script> 