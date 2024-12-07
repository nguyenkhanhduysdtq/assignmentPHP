<?php

class connectDB
{

    function openConnect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "k72_nhom5";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
