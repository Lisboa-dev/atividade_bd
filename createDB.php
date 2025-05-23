<?php
  $servername = "localhost";
 $username = "root";
 $password="2502";
 $conn = new mysqli($servername,$username, $password);


 $sql = file_get_contents(__DIR__ .'/academia.sql');

 if ($conn->multi_query($sql) === TRUE) {
  echo "Database created successfully";
}
  else {
  echo "Error creating database: " . $conn->error;
}

 $conn->close();
?>