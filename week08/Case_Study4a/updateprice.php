<?php
  // create short variable names
  $singlePrice=$_POST['singlePrice'];
  $doublePrice=$_POST['doublePrice'];
  $name=$_POST['name'];


 

   @ $db = new mysqli('localhost', 'root', '', 'javajam');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $sql = "update coffee set price=$singlePrice where name='".$name."'and is_double=0";

  if ($db->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $db->error;
  }

  if ($doublePrice){
    $sql01 = "update coffee set price=$doublePrice where name='".$name."' and is_double=1";

    if ($db->query($sql01) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $db->error;
    }
}
   $db->close();

  header("Location: http://localhost:8000/Case_Study4a/priceupdate.php");
exit();
?>