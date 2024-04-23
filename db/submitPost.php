<?php 

include'function.php';
include'config.php';
// 
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $type = htmlspecialchars($_POST['type']);
    $title = htmlspecialchars($_POST['title']);
    $news = htmlspecialchars($_POST['news']);
    
    // Set the default timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d H:i:s");
    // image upload function and return new image name
    $img = uploadImage('image', '../img/');
    // newId  Number
    $newsId = removeExtension($img);


    // Prepare an INSERT statement
    $sql = $conn->prepare("INSERT INTO `post-table`(`postNo`, `type`, `title`, `date`, `detail`, `img`, `user`) 
    VALUES (?, ?, ?, ?, ?, ?, ?)");

    $user ="all";

    //Bind  parameters
    $sql ->bindParam(1, $newsId);
    $sql ->bindParam(2, $type);
    $sql ->bindParam(3, $title);
    $sql ->bindParam(4, $date);
    $sql ->bindParam(5, $news);
    $sql ->bindparam(6, $img);
    $sql ->bindParam(7, $user);

    // Execute the statement
    if($sql->execute()){
        // Send success response
        echo json_encode(array('status'=> 'success', 'message'=> 'Successfully'));
    }else{
        //sebd failed response
        echo json_encode(array('status'=>'Fail', 'message'=> 'Failed'));
    }
    
}
?>

