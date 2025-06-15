<?php
        $host = "127.0.0.1";
        $user ="root";
        $password = "";
        $database ="rota42luanda";

       $connection = mysqli_connect($host, $user, $password, $database);
       if (!$connection)
            echo "Faliure";
?>