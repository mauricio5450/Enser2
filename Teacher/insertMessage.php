<?php
    include("authconnection.php");
    require_once ('../connection.php');

    $fromUser = $_POST["fromUser"];
    $toUser = $_POST["toUser"];
    $message = $_POST["message"];

    $output="";
    
    $sql = "INSERT INTO messages (FromUser, ToUser, Message)
    VALUES ('$fromUser','$toUser','$message')";

    if($conn->query($sql)){
        $output.="";
    }else{
        $output.="Error. Please Try Again";
    }

    echo $output;
?>