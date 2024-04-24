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
   <?php include '../component/navbar.php';
    $id = $_GET['name'];
   
    // database connection config file include
        include'../db/config.php';

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM `post-table` WHERE `post-no` = '$id' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch data
    $data = $stmt->fetchAll();

    foreach ($data as $row) {
            
        $type = $row['type'];
        $img  = $row['img'] ;
        $title  = $row['title'] ;
        $description  = $row['detail'] ;
        $date  = $row['date'] ;
    ?>
     <!-- Content Section -->
     <section>
        <div class="container">
        <strong class="mt-3" style="font-size:18px;"> <?php echo $title; ?></strong>
                   <div class="row m-2">
                   <img src="../img/<?php echo $img; ?>" alt="" width="100%" min-height="100%" max-height="auto" >
                   </div>         
        <p class="mt-2"><?php echo $description; ?></p>
        </div>
    </section>
    <?php } ?>

    <!-- Back Button code -->
    <div class="row">
        <div class="col-2">
            <button onclick="goBack()" class="back-btn" type="button"><b>&#8592;</b>Back</button>
            <script>
                function goBack() {
                window.history.back();
                }
                </script>
        </div>
    </div>

    <style>
         .back-btn{
    width: 80px;
    border-radius: 20px;
    padding: 4px;
    margin: 5px;
   }
    
    </style>
  
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


</body>
</html>


