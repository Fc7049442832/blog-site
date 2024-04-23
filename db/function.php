<?php
    // image uploading function  (function call - $uploadResult = uploadImage(InputImageName, 'FolderPath');)
    function uploadImage($fileInputName, $targetDirectory) {
        // Check if file was uploaded without errors
        if(isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
            // Get file name
            $fileName = $_FILES[$fileInputName]['name'];
            // Get file size
            $fileSize = $_FILES[$fileInputName]['size'];
            // Get temporary file location
            $fileTmpName = $_FILES[$fileInputName]['tmp_name'];
            // Get file type
            $fileType = $_FILES[$fileInputName]['type'];
    
            // Check file size
            if($fileSize > 2000000) { // Adjust the maximum file size as needed (currently set to 2MB)
                return "Sorry, your file is too large.";
            }
    
            // Allow certain file formats (you can add more file types if needed)
            $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            if(!in_array($fileExtension, $allowedExtensions)) {
                return "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            }
    
            // Generate a unique file name to avoid overwriting existing files
            $newFileName = "Tech".uniqid('', true) . '.' . $fileExtension;
            $targetFilePath = $targetDirectory . $newFileName;
    
            // Move the uploaded file to the desired directory
            if(move_uploaded_file($fileTmpName, $targetFilePath)) {
                return "$newFileName";
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        } else {
            return "Sorry, there was an error uploading your file.";
        }
    }

    // Image filename  Extension Remove function  and call the  function Example :-
    function removeExtension($filename) {
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $filenameWithoutExtension = substr($filename, 0, -(strlen($extension) + 1)); // +1 for the dot separator
        return $filenameWithoutExtension;
    }
    

    