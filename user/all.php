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
include '../db/datafetch.php';
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
            <?php
            // Output fetched data
            foreach ($data as $row) {
            
                $type = $row['type'];
                $img  = $row['img'] ;
                $title  = $row['title'] ;
                $news  = $row['post-no'] ;
                $date  = $row['date'] ;
            ?>
            <div class="col-md-5  mt-4">
                <a href="news.php?name=<?php echo $news; ?>" style="text-decoration: none; color: rgb(54, 54, 54); float-left">
                    <div class="row">
                        <div class="col-5">
                            <img src="../img/<?php echo $img; ?>" alt="" width="100%" min-height="100%" max-height="auto" >
                        </div>
                        <div class="col-7">
                            <strong><?php echo $type; ?></strong> : 
                            <small><?php echo $title; ?></small>
                            <div class="date"><?php echo $date; ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- loop end -->
            <?php } ?>          

        </div>
    </div>
</section>

<?php 
include '../component/footer.php';
?>
    
</body>
</html>