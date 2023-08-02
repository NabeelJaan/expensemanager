<?php

    include_once('db_connection.php');

    if (isset($_POST['submit'])){

        $p_income       = mysqli_real_escape_string($conn, $_POST['income']);
        $cat_income     = mysqli_real_escape_string($conn, $_POST['categories']);
        $des_income     = mysqli_real_escape_string($conn, $_POST['description']);
        $date_income    = mysqli_real_escape_string($conn, $_POST['date']);
        $time_income    = mysqli_real_escape_string($conn, $_POST['time']);

    }

    $nbl = "INSERT INTO income ( p_income, cat_income, des_income, date_income, time_income )
    VALUES( '$p_income', '$cat_income', '$des_income', '$date_income', '$time_income' )";

    $results = mysqli_query($conn, $nbl);

    if($results){
        echo "Form Submitted successfully";
    }else {
        echo "entery the form fields";
    }

    mysqli_close($conn);

    header( "Location: index.php" );
    
?>