<?php
include ("database.php");

// Get program_code from URL
if (isset($_GET["program_code"])) {
    $program_code = intval($_GET["program_code"]);

    // Insert into demands table
    $sql = "INSERT INTO demands (program_code) VALUES ('$program_code')";

    if ($connection->query($sql) === TRUE) {
        echo "Program added to demands successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
} else {
    echo "No program selected.";
}

$connection->close();
?>
