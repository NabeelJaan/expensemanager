    <?php

        include_once('db_connection.php');

        if( isset( $_POST['submit'] ) ){

            $expense        = mysqli_real_escape_string( $conn, $_POST['expense'] );
            $ex_category    = mysqli_real_escape_string( $conn, $_POST['ex_category'] );
            $ex_description  = mysqli_real_escape_string( $conn, $_POST['ex_description'] );
            $ex_date        = mysqli_real_escape_string( $conn, $_POST['ex_date'] );
            $ex_time        = mysqli_real_escape_string( $conn, $_POST['ex_time'] );
        }

        $sql_query = "INSERT INTO expenses ( expense_amount, expense_cat, ex_description, expense_date, exense_time ) 
        VALUES ( '$expense', '$ex_category', '$ex_description', '$ex_date', '$ex_time' )";

        $results = mysqli_query( $conn, $sql_query );

        if($results){
            echo "Form Submitted successfully";
        }else {
            echo "entery the form fields";
        }

        mysqli_close($conn);

        header( "Location: index.php" );

    ?>