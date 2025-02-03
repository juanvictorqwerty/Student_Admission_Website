<?php
    include("database.php");

    $sql = "INSERT INTO demands (  applicant_id, program_code, admission_status )
            VALUES( '1','2','3' )";

    if (mysqli_query($connection, $sql)) {
        echo "Query submitted successfully.";
    } else {
        echo "Error submitting query: " . mysqli_error($connection);
    }

    mysqli_close($connection);
?>
