<!DOCTYPE>
<html>
<head>
<?php

$conn = mysqli_connect("localhost","root");

if($conn === false){
  die( "ERROR:COULD NOT CONNECT"
  . mysqli_error());
}

$olduser = $_REQUEST['olduser'];
$newuser = $_REQUEST['newuser'];
$oldpass = $_REQUEST['oldpass'];
$newpass = $_REQUEST['newpass'];

if($olduser === "" || $newuser === "" || $oldpass === "" || $newpass === ""){
  echo "Missing identifications; Check again";
  exit;
}


$sql = "SELECT username FROM testdb3.testtable3 WHERE username = '$olduser'";

$result = $conn->query($sql);

if ($result->num_rows <= 0){
  echo "Username/Account does not exist.";
  exit;
}


$sql = "UPDATE testdb3.testtable3 SET username = '$newuser',password = '$newpass' WHERE username = '$olduser' AND password = '$oldpass'";

if(mysqli_query($conn,$sql)){

  echo "Account has been updated";

}

else {
  echo "An error has occured in inputting information. Try Again.";
}

mysqli_close($conn);
?>

</head>

<body>



</body>


</html>
