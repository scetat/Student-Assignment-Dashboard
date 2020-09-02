
<?php  
 require('Config.php');

 $enumber1 = $_POST['e_number'];
 $password1 = $_POST['s_password'];
 session_start();
 $_SESSION["username"]="$enumber1";
 $result1 = mysqli_query($conn, "SELECT fname, lname, enumber, emailid, mnumber, branch, year, password FROM `registration` WHERE enumber='$enumber1'");
 $query1= mysqli_fetch_row($result1);
 $_SESSION["name1"]="$query1[0]";
 $_SESSION["lname"]="$query1[1]";
 $_SESSION["enumber"]="$query1[2]";
 $_SESSION["emailid"]="$query1[3]";
 $_SESSION["mnumber"]="$query1[4]";
 $_SESSION["branch"]="$query1[5]";
 $_SESSION["year"]="$query1[6]";


if (!empty($enumber1) || !empty($password1)){

// Assigning POST values to variables.

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `registration` WHERE enumber='$enumber1' and password='$password1'";
 
$result = mysqli_query($conn, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count){
header("Location: sside.php");



}else{
echo '<script> alert("invalid")</script>';
echo '<script>window.location="http://localhost/SE/login.html"</script>';
//echo "<a href='login.html'>Invalid Login Credentials please return to login page</a>";
}
}
else{
	
		echo"Filed is  not set";

}



?>