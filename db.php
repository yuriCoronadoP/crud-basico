<?php

session_start();

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'crud_basico'
    );

    // if(isset($conn)){
    //     echo 'DB is conected';
    // }
?>