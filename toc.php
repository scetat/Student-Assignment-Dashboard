
<?php
require('Config.php');
session_start();
if(!isset($_SESSION['username']))
{
    // not logged in
    header('Location: login.html');
    exit();
}
$ch1 = $conn->real_escape_string($_POST['ch']);

$enumber1 = $_SESSION["username"];


// Include the database configuration file
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into sub_toc (enumber, ass, chapter, upload_t) VALUES ('".$enumber1."', '".$fileName."', '".$ch1."', NOW())");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
//echo '<script> alert("success")</script>';
echo '<script> alert ("'.$statusMsg.'")</script>';
echo '<script> window.location="http://localhost/SE/sside.php" </script>';
//header("Location: sside.php");
?>