<?php
echo "MYSQL DATALOADER API  RINIL<br>";
$conn = new mysqli("mysql", "root", "password", "company");
// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE employees (first_name varchar(25),last_name  varchar(25),department varchar(15),email  varchar(50));";
$sql1 = "INSERT INTO employees (first_name, last_name, department, email) VALUES ('rinil', 'raveendrana', 'IT', 'rinil@mail.com'),('John', 'Rambo','Sales', 'johnrambo@mail.com'),('Clark', 'Kent','HR', 'clarkkent@mail.com'),('John', 'Carter','IT', 'johncarter@mail.com'),('Harry', 'Potter','AD', 'harrypotter@mail.com');";
//$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "...Table employees created successfully...";
   if ($conn->query($sql1) === TRUE) {
      echo "...Sample data Loaded...";
        } 
   else {
      echo "Sample data exists " . $conn->error;
        }
} 

else {
    echo "....... " . $conn->error;
}

$conn->close();
?>
