<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../component/link.php'; ?>
</head>
<body>
<?php 
include '../component/navbar.php';
?>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 m-4 text-center">
              <h3>Contact Us</h3>  
            </div>

            <div class="col-12">
               <b>Welcome to Tech Radar's Contact Us page!</b>  We're thrilled to hear from you. Whether you have a tip, suggestion, or just want to draop a line to say hello, we value your feedback and are here to assist you.
            </div>
        </div>

        <div class="row justify-content-around">
        <div class="col-md-5 mt-2">
           <div class=" text-center text-white bg-secondary mt-4 p-2">General Inquiries </div>
            <div class="">
                Have a question about our  coverage, want to report an issues, or just want to say hi? Feel free to reach out to us at <strong>TechRadar@techradar.site</strong>
            </div>
        </div>
    
        <div class="col-md-5 mt-2">
           <div class=" text-center text-white bg-secondary mt-4 p-2">Editorial Inquiries </div>
            <div class="">
                For editorial inquiries, including story pitches, corrections, or feedback on specific articles, please contact our editorial team at Shivam@techradar.site
            </div>
        </div>
    
        <div class="col-md-5 mt-2">
           <div class=" text-center text-white bg-secondary mt-4 p-2">Advertising & Partnerships </div>
            <div class="">
                Interested in advertising with us or exploring partnership opportunities?<br> <b>Contact our advertising team at</b> Shivam@Techradar.site
            </div>
        </div>
    
        <div class="col-md-5 mt-2">
           <div class=" text-center text-white bg-secondary mt-4 p-2">Press Inquiries </div>
            <div class="">
                Members of the press seeking information about Tech Radar, our coverage, or interviews should reach out to our press team at Shivam@Techradar.site
            </div>
        </div>
    
        <div class="col-md-5 mt-2">
           <div class=" text-center text-white bg-secondary mt-4 p-2">Technical Support </div>
            <div class="">
            Experiencing technical issues with our website or apps? Our technical support teamis here to help. Contact them at Shivam@techradar.site    
            </div>
        </div>
    
        <div class="col-md-5 mt-2">
            <div class="1 text-center text-white bg-secondary mt-4 p-2">Feedback Form</div>
            <div class="">
            Alternatively, you can fill out the form below to send us your feedback, sugestions, or inquiries. We strive to respond to all messages within 24x7 hours.   
            </div>
        </div>
        
        </div>
        <!-- Contact Form code -->
        <div class="row justify-content-center m-4 text-center">
            <div class="col-md-6">
              
            <form action="../db/submitContact.php" id="contactForm" method="post" class="contact-form">
                <h4>Contact Form</h4>
                <input type="text" class="input" name="name" placeholder="Full Name" required> <br>
                <select name="gen" id="">
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select> <br>
                <input type="email" class="input" name="email" placeholder="Email Id" required><br>

                <input type="text" id="mobile" name="mobile" maxlength="10" onkeypress="validateMobile(event)">
                <p id="message"></p>
                
                <textarea name="message" id="" cols="30" rows="4" placeholder="message.."></textarea>
                <button class="btn btn-danger" type="reset">Reset</button>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
              Thank you for visiting  Tech Radar site and for you interest in contacting us. <br> We look forward to connection with you!  
            </div>
        </div>

    </div>
</section>

<?php 
include '../component/footer.php';
?>


<script>
    function validateMobile(event) {
    const mobileInput = document.getElementById('mobile');
    const messageElement = document.getElementById('message');
    const regex = /^[6789]\d{0,9}$/; // Allow partial numbers for validation as typing progresses

    // Check the entire value of the input along with the newly typed character
    let proposedValue = mobileInput.value + (event.key ?? '');
    if (!regex.test(proposedValue)) {
        messageElement.textContent = "Invalid input. Mobile number must start with 6, 7, 8, or 9 and be up to 10 digits.";
        messageElement.style.color = "red";
        event.preventDefault(); // Stop the character from being input
    } else {
        messageElement.textContent = "";
    }
}


    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Submit the form data using AJAX
        var form = this;
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open(form.method, form.action, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    // Show success message
                    alert(response.message);
                    // Optionally, you can redirect the user to another page
                    // window.location.href = 'success.html';
                    form.reset(); // Clear the form
                } else {
                    // Show error message
                    alert(response.message);
                }
            } else {
                // Show error message
                alert('Error: Server returned status ' + xhr.status);
            }
        };

        xhr.onerror = function() {
            // Show error message
            alert('Error: Request failed');
        };

        xhr.send(formData);
    });

</script>
</body>
</html>