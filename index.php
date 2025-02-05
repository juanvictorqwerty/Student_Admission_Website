<?php
include("database.php");

// Query to fetch programs
$query = "SELECT program_code FROM programs";
$result = mysqli_query($connection, $query);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $selectedProgram = mysqli_real_escape_string($connection, $_POST['selectedProgram']);

    // Insert into demands table
    $insertQuery = "INSERT INTO demands (applicant_name, applicant_email, program_code) 
                    VALUES ('$name','$email','$selectedProgram')";
    
    if (mysqli_query($connection, $insertQuery)) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
    <script>
        // Function to handle the program selection
        function selectProgram(program) {
            // Set the value of the hidden input field to the selected program
            document.getElementById("selectedProgram").value = program;
        }
    </script>
</head>
<body>
    <h2>Personal Information Form</h2>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label>
        <input type="phone" id="phone" name="phone" required><br><br>

        <label for="birthday">Birthday:</label>
        <input type="date" id="birthday" name="birthday" required><br><br>

        <!-- Hidden input field to store the selected program -->
        <input type="hidden" id="selectedProgram" name="selectedProgram">


    <h3>Programs</h3>
    <ul>
        <?php
        // Check if there are any programs in the database
        if (mysqli_num_rows($result) > 0) {
            // Display each program in a list and make each clickable
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li onclick='selectProgram(\"" . htmlspecialchars($row['program_code']) . "\")' style='cursor:pointer;'>" . htmlspecialchars($row['program_code']) . "</li>";
            }
        } else {
            echo "<li>No programs found</li>";
        }
        ?>
    </ul>

    <button type="submit">Submit</button>
</form>
</body>
</html>
