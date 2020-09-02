<?php 
require('Config.php');
session_start();
$fname1 = $conn->real_escape_string($_POST['f_name']);
$lname1 = $conn->real_escape_string($_POST['l_name']);
$enumber2 = $conn->real_escape_string($_POST['e_number']);
$emailid1 = $conn->real_escape_string($_POST['email_id']);
$mnumber1 = $conn->real_escape_string($_POST['m_number']);
$branch1 = $conn->real_escape_string($_POST['branch']);
$year1 = $conn->real_escape_string($_POST['s_year']);

if(!empty($fname1) || !empty($lname1) || !empty($enumber1) || !empty($emailid1) || !empty($mnumber1) || !empty($branch1) || !empty($year1))
{

$sql="UPDATE registration SET fname='".$fname1."', lname='".$lname1."', enumber='".$enumber2."', emailid='".$emailid1."', mnumber='".$mnumber1."', branch='".$branch1."', year='".$year1."' WHERE enumber='".$enumber1."' ";
if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
    }
    else
    {
    echo "Profile updated";
    header("Location: sside.php");
    }
    }
    else
    {
    echo "Error !!";
    }
$conn->close();
?>