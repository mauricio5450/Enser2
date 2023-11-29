<?php
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn, 'ensertest');

if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $query = "DELETE FROM classes WHERE instructor_id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        echo'<script> alert("Data Deleted"); </script>';
        header("location: TeacherDash.php");
    }else{
        echo'<script> alert("Data Not Deleted"); </script>';
    }
}

?>