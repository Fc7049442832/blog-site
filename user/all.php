<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../component/link.php'; ?>
    <style>
        .date{
    font-size: 12px;
    text-align: right;
}
    </style>
</head>
<body>
<?php 
include '../component/navbar.php';
?>

<section>
    <div class="container">
        <!-- searching  box  -->
        <div class="row justify-content-end mt-3">
            <div class="col-md-4 text-center">
                <input type="text" name="search-box" onkeypress="" id="search-box" placeholder="&#128269 Search">
            </div>
        </div>

        <!-- Content Start  -->
        <div class="row justify-content-around">
            <!-- looping -->
            <div class="col-md-5  mt-4">
                <a href="" style="text-decoration: none; color: rgb(54, 54, 54); float-left">
                    <div class="row">
                        <div class="col-5">
                            <img src="../img/img4.jpeg" alt="" width="100%" min-height="100%" max-height="auto" >
                        </div>
                        <div class="col-7">
                            <strong>heading</strong> : 
                            <small>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, reprehenderit.</small>
                            <div class="date">21.04.2024</div>
                        </div>
                    </div>
                </a>
            </div>
        
            <div class="col-md-5  mt-4">
                <a href="" style="text-decoration: none; color: rgb(54, 54, 54); float-left">
                    <div class="row">
                        <div class="col-5">
                            <img src="../img/img4.jpeg" alt="" width="100%" min-height="100%" max-height="auto" >
                        </div>
                        <div class="col-7">
                            <strong>heading</strong> : 
                            <small>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, reprehenderit.</small>
                            <div class="date">21.04.2024</div>
                        </div>
                    </div>
                </a>
            </div>
        


            

        </div>
    </div>
</section>

<?php 
include '../component/footer.php';
?>
    
</body>
</html>