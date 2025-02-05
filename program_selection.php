<?php
include ("database.php");

// Fetch programs
$sql = "SELECT * FROM programs";
$result = $connection->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs List</title>
</head>
<body>
    <h2>List of Programs</h2>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $program_code = $row["id"]; // Assuming "id" is the primary key in the programs table
                $program_name = htmlspecialchars($row["program_name"]);
                echo "<li><a href='store_demand.php?program_code=$program_code'>$program_name</a></li>";
            }
        } else {
            echo "<li>No programs found</li>";
        }
        $connection->close();
        ?>
    </ul>
</body>
</html>
