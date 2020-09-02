<?php 
require_once("Config.php");

$fname1 = $conn->real_escape_string($_POST['f_name']);
$lname1 = $conn->real_escape_string($_POST['l_name']);
$enumber1 = $conn->real_escape_string($_POST['e_number']);
$emailid1 = $conn->real_escape_string($_POST['email_id']);
$mnumber1 = $conn->real_escape_string($_POST['m_number']);
$branch1 = $conn->real_escape_string($_POST['s_branch']);
$year1 = $conn->real_escape_string($_POST['s_year']);
$password1 = $conn->real_escape_string($_POST['s_password']);
$cpassword1 = $conn->real_escape_string($_POST['s_cpassword']);

if(!empty($fname1) || !empty($lname1) || !empty($enumber1) || !empty($emailid1) || !empty($mnumber1) || !empty($branch1) || !empty($year1) || 
    !empty($password1) || !empty($cpassword1))
{
    if($password1 == $cpassword1)
    {
    $SELECT = "SELECT enumber From registration Where enumber = ? Limit 1";
$sql="INSERT INTO registration (fname, lname, enumber, emailid, mnumber, branch, year, password, cpassword) VALUES ('".$fname1."','".$lname1."', '".$enumber1."','".$emailid1."', '".$mnumber1."','".$branch1."','".$year1."', '".$password1."', '".$cpassword1."')";


$stmt = $conn->prepare($SELECT);
$stmt->bind_param("s",$enumber1);
$stmt->execute();
$stmt->bind_result($enumber1);
$stmt->store_result();
$rnum = $stmt->num_rows;

if($rnum==0){
    $stmt->close();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisisiss", $fname1, $lname1, $enumber1, $emailid1, $mnumber1, $branch1, $year1, $password1, $cpassword1);
    $stmt->execute();
    echo "Successfully added";
    header("Location: login.html");
}
else{
    echo "some one already register with this Enrollment Number";
}
$stmt->close();
$conn->close();
    }

    else{
        echo "Password Do not match.";
    }

}
else{
    echo "All fields are Required";
    die();
}

?>