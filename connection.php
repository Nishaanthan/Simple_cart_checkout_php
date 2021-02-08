<?php
    $con = mysqli_connect("localhost", "root", "", "shopping","3308");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>