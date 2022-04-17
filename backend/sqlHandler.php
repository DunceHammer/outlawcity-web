<?php
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $port = 3306;
    $database = 'outlawcity';
    $conn;

    function connectToDatabase(){
        global $host, $username, $password, $port, $database, $conn;
        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            return("Could not connect to database");
        }
        return("Connected successfully");
    }

    //Security risk if used carelessly
    function query($sql){
        global $conn;
        $result = mysqli_query($conn, $sql);
        return(mysqli_fetch_array($result));
    }

    connectToDatabase();
?>