<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include '../component/link.php' ?>
  <style>
    /* Make the image fully responsive */
    .carousel-inner img {
      width: 100%;
      height: 100%;
    }
    
    section{
        margin: 5px auto;
    }


    /* news card style code */
    .card-img{
        width: 100%;
        text-align: center;
       
    }
    .card-img img{
        border-radius: 10px;
    }
    .news-card-p{
        width: 100%;
        height: 80px;
        overflow: hidden;
    }
    .news-card-p a{
       text-decoration: none;
       color: rgb(44, 44, 44);
    }
    .news-card-date{
        width: 200px;
        text-align: right;
        font-size: 14px;
    }


    /* subscribe form style code */
    .subscribe-form{
            padding: 25px 3%
        }
        .subscribe-form input{
            min-width: 250px;
            max-width: 70%;
            margin-top: 5px;
            padding: 10px;
            border-radius: 5px;
        }
        .subscribe-form button{
            min-width: 100px;
            max-width: 25%;
            margin-top: 5px;
            padding: 10px;
            border-radius: 5px;
            font-weight: 500;
            background-color: rgb(0, 247, 255);     
        }
       .footer a{
        text-decoration: none;
        color: aliceblue;
    }
    </style>
</head>
<body>
    <!-- Navbar Section code -->
   <?php include '../component/navbar.php'; ?>

 
    <!-- image slider code section -->
    <section>
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../img/img1.jpeg" alt="Los Angeles" width="1100" height="500">
                <div class="carousel-caption">
                  <h3></h3>
                  <p></p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="../img/img2.jpeg" alt="Chicago" width="1100" height="500">
                <div class="carousel-caption">
                  <h3></h3>
                  <p></p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="../img/img3.jpeg" alt="New York" width="1100" height="500">
                <div class="carousel-caption">
                  <h3></h3>
                  <p></p>
                </div>   
              </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
    </section>
<br>    
    <!-- short form Recently News card section -->
    <section>
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-md-4"> <h3>Recently News</h3></div>
            </div>
           
            <div class="row justify-content-around mt-3 pt-2">
                <!-- looping starting  -->
                 <!-- php code start  -->
                    <?php
                        include '../db/datafetch.php';
                        foreach($data as $row){
                            $id = $row['post-no'];
                            $img  = $row['img'] ;
                            $title  = $row['title'] ;
                            $news  = $row['detail'] ;
                            $date  = $row['date'] ; 
                        ?>

                <div class="col-lg-3 col-md-5 m-1 p-1" style="border: 1px solid black;  border-radius: 10px;">
                   <div class="row">
                        <div class="card-img">
                            <img src="../img/<?php echo $img; ?>" alt="new-pic" width="260px" height="140px">
                        </div>
                        <div class="news-card-p mt-1 text-center">
                            <a href="news.php?name=<?php echo $id;?>">
                                <p><?php echo $title; ?></p>
                            </a>
                        </div>
                    </div>
                    <div class=" row news-card-date">
                        <div class="col"><small><?php echo $date; ?></small></div>
                    </div>
                </div>
                <?php } ?>
                <!-- end php code -->
                <!-- loop end -->
            </div>
        </div>
    </section>

               
    <!-- Subscribe form section -->
    <section>
        <div class="contaioner m-2">
            <div class="row text-center justify-content-around">
                <div class="col-md-5">
                    <form action="../db/subscribe.php" method ="POST" class="subscribe-form" id="subscribe-form">
                        <input type="email" name="subscriber-email" placeholder="Email" required>
                        <button  type="submit">Subscribe</button>
                    </form>
                </div>
                <!-- <div class="col-md-3">
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> 
                    </div>

                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Danger!</strong> 
                    </div>
                      
                </div> -->
            </div>
        </div>
    </section>


     <!-- User commits -->
        <section>
         
            <div class="container">
                <div class="row" id="accordion">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#Comments">
                                User Comments
                                </a>
                            </div>
                            <div id="Comments" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    <!-- comment card code -->
                                    <div style="margin: 2px; padding: 2px;">
                                        <div style="float: left; margin-right: 20px;"><img src="" alt="user" width="30px" height="30px"></div>
                                        <div><strong> Hi Tech Radar !</strong> </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    <!-- Footer Section Code -->
    <?php include '../component/footer.php' ?>


    <script>
          document.getElementById('subscribe-form').addEventListener('submit', function(event) {
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


