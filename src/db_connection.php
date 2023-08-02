<?php

    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'expensemanager';


    $conn = mysqli_connect( $serverName,  $userName, $password, $dbName);

    if(!$conn){
        die( "Connection failded: " . mysqli_connection_error() );
    }

?>