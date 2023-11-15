<?php
session_start();

if (!isset($_SESSION['username'])) {

    header("Location: TeacherLogin.php");
    exit();
}
if (isset($_GET['class_id'])) {
    // Set the selected class ID in the session
    $_SESSION['selected_class'] = $_GET['class_id'];

    // You can optionally send a response back to the client
    echo "Class ID updated successfully";
}
?>