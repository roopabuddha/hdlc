<?php

$servername = "phpMyAdmin";
$username = "root";
$password = "";
$dbname = "test";
$name = "name";
$id = "id";
$course = "course";
$department = "department";
$contact = "contact";
$email = "email";
$dateofbirth = "dateofbirth";
$gender = "gender";
$parentgaurdianname = "parentgaurdianname";
$Semester = "semester"
$gpa = "gpa";

//Creating a new connection to the database
$connection = new mysqli('localhost','root', '','test');

//Checking the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

//SQL string used to insert the data into the database
$sql = "INSERT INTO student (name,id,course,department,contact,email,dateofbirth,gender,parentgaurdianname,semester,gpa)values(?,?,?,?,?,?,?,?,?,?,?)";

$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "Failed";
} else {
    mysqli_stmt_bind_param($stmt, "sss", $_POST["name"], $_POST["id"], $_POST["course"],$_POST["department"],$_POST["contact"],$_POST["email], $_POST["dateofbirth"],$_POST["gender"], $_POST["parentgaurdianname"], $_POST["semester"], $_POST["gpa"]);
    mysqli_stmt_execute($stmt);
    echo $execval;
        echo "registration successfully...";
        $stmt->close();
        $connection->close();
}
?>