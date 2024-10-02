<?php

include 'Students.php';

if(isset($_GET['student_id'])){

    Students::$id = $_GET['student_id'];
    Students::delete();
    header("Location: index.php");
}
?>
