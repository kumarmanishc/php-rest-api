<?php
    function getConnection()
    {
        $host = 'localhost';
        $db_name = 'ninja';
        $username = 'swastik';
        $password = 'Kcss$0186';
        $conn= new mysqli($host, $username, $password, $db_name);
        if ($conn->connect_error) {
            $conn= null;
        }
        return $conn;
    }
