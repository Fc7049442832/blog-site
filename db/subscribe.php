<?php

include 'config.php';
// check if the form was submitted

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $email = htmlspecialchars($_POST['subscriber-email']);

    // Set the default timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d H:i:s");
    
    // Prepare an INSERT statement
    $sql  = $conn-> prepare("INSERT INTO `subscriberdata`(`id`, `subscriber`, `date`) VALUES (?,?,?)");
    $id ="null";

    // Bind Parameters
    $sql -> bindParam(1, $id);
    $sql -> bindParam(2, $email);
    $sql -> bindParam(3, $date);

    //Execute the statement
    if($sql-> execute()){
        // send success responce
        echo json_encode(array('status'=> 'success', 'message' => 'Subscribed' ));
    }else{
        // Send failed response
        echo json_encode(array('status'=> 'success', 'message' => 'Subscribed Failed' ));
    }
}