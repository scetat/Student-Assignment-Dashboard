
<?php  
 require('Config.php');

 $fid1 = $_POST['f_id'];
 $fpassword1 = $_POST['f_password'];
 session_start();
 $_SESSION["username"]="$fid1";
 $result1 = mysqli_query($conn, "SELECT fname, lname FROM `flogin` WHERE fid='$fid1'");
 $query1= mysqli_fetch_row($result1);
 $_SESSION["name1"]="Prof. $query1[0] $query1[1]";

 
if (!empty($fid1) || !empty($fpassword1)){
	
// Assigning POST values to variables.


// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `flogin` WHERE fid='$fid1' and fpassword='$fpassword1'";
 
$result = mysqli_query($conn, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count){
header("Location: fside.php");
//echo "Login Credentials verified";
//echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

}else{
//echo "<a href='6.html'><script type='text/javascript'>alert('Invalid Login Credentials')</script></a>";
echo '<script> alert("invalid")</script>';
echo '<script>window.location="http://localhost/SE/login.html"</script>';
}
}
else{
	
		echo"Filedd is  not set";

}
?>