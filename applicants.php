<?php
include ("database.php");

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$birthday = $_POST['birthday'];
$phone = $_POST['phone'];

// Insert data into table
$sql = "INSERT INTO applicants (applicant_name, applicant_email, applicant_birthday) VALUES ('$name', '$email', '$birthday')";


if ($connection->query($sql) === TRUE) {
    header("Location: program_selection.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$connection->close();
?>
