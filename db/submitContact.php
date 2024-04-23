
<?php
include'config.php';
// Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $gen = htmlspecialchars($_POST['gen']);
        $email = htmlspecialchars($_POST['email']);
        $mobile = htmlspecialchars($_POST['mobile']);
        $message = htmlspecialchars($_POST['message']);

        // Set the default timezone
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s");

        // Prepare an INSERT statement
        $stmt = $conn->prepare("INSERT INTO `contact_table`(`id`, `fullName`, `gender`, `email`, `mob`, `commit`, `date`) 
        VALUES (?, ?, ?, ?, ?, ? , ?)");
       
        $id ="null";
    
        // Bind parameters
        $stmt->bindParam( 1, $id);
        $stmt->bindParam( 2, $name);
        $stmt->bindParam( 3, $gen);
        $stmt->bindParam( 4, $email);
        $stmt->bindParam( 5, $mobile);
        $stmt->bindParam( 6, $message);
        $stmt->bindParam( 7, $date);

        // Execute the statement
        if ($stmt->execute()) {
            // Send success response
        echo json_encode(array('status' => 'success', 'message' => 'Message sent successfully!'));
  
        } else {
             // Send failed response
        echo json_encode(array('status' => 'Fail', 'message' => 'Failed to send message.'));
    
        }

        
    }