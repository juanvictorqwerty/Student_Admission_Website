<?php

   $db_server= "localhost";
   $db_user = "root";
   $db_name = "admissions";
   $db_password = "";
   $connection ="";

   $connection = mysqli_connect($db_server,
                                $db_user, 
                                $db_password,
                                 $db_name);

    if ($connection) {

        echo " ";
        }
        else {
            echo "Connection failed";
        }



?>