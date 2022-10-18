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

  $sql = "UPDATE coffee SET price=$singlePrice WHERE name='".$name."'and is_double=0";

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

  header("Location: http://localhost:8000/case%20study/IE4717---Case-Study/priceupdate.php");
exit();
?>