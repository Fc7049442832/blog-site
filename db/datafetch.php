<?php
// database connection config file include
    include'config.php';

// Prepare and execute the SQL query
$sql = "SELECT * FROM `post-table` ORDER BY `id` DESC limit 10 ";
$stmt = $conn->prepare($sql);
$stmt->execute();

// Fetch data
$data = $stmt->fetchAll();

?>