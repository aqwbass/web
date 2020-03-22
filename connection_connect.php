<?php
        
        $servername = "localhost";
        $username = "db19_055";
        $password = "db19_055";
        $dbname = "db19_055";
        //Create connection
        $conn = new mysqli($servername,$username, $password);
        //check connection
        if($conn->connect_error){
                die("Connection failed: ".$conn->connect_error);
        
        }
        


        //Connect database
        if(!$conn->select_db($dbname)){
                die("Connection failed: ".$conn->connect_error);
        }

        
?>