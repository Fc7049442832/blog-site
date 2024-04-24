<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add post</title>
    <?php include '../component/link.php'; ?>
</head>
<body>
<?php include '../component/navbar.php'; ?>
 <!--  News Post content code -->
 <section>
        <div class="container">
            <!-- Heading Row -->
            <div class="row mt-2 justify-content-center text-center">
                <div class="col-md-6 bg-primary p-1 text-white h5"> Add Post</div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 post">
                    <!-- Post Form Start -->
                    <form action="../db/submitPost.php" method="post" enctype="multipart/form-data"  id="contactForm">
                        <!-- news Type Selection filed -->
                        <select name="type" id="">
                            <option disabled >Select Category </option>
                            <option value="IT">Technology</option>
                            <option value="Biz">Business</option>
                            <option value="Entmt">Entertainment</option>
                            <option value="Sports">Sports</option>
                            <option value="Politics">Politics</option>
                            <option value="Other">Other</option>
                        </select>

                        <!-- Heading/title Input filed -->
                        <input type="text" name="title" id="" placeholder="Title">

                        <!-- news input filed-->
                        <textarea name="news" id="" cols="40" rows="4" placeholder="Description"></textarea>
                        
                        <!-- img/video uploading filed -->
                        <div class="row">
                            <div class="col-md-6">
                            <input type="file" name="image" accept="image/*" required>
                            </div>
                            <div class="col-md-6 pt-2">
                                <small>Allow .jpg, .jpeg, .png file</small>
                            </div>
                        </div>

                        <!-- Post and Form Reset Button  -->
                        <div class="row justify-content-between">
                            <button class="col-md-3 col-5 m-3 btn btn-danger" type="reset"><strong>Reset</strong></button>
                            <button class="col-md-3 col-5 m-3 btn btn-success" type="submit" m-3><strong>Post</strong></button>
                        </div>  
                    </form>
                    <!-- Closed Post Form -->
                </div>
            </div>
        </div>
    </section>

<?php include '../component/footer.php'; ?>


<script>
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