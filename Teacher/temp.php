<?php
    include("authconnection.php");
    require_once ('../connection.php');
    $professor = intval($_SESSION['instructor_id']);
    $sql = "SELECT *
            FROM teachers";
    $all_classes = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
<!--The beginning of the navbar-->
        <nav class="navbar navbar-expand-sm navbar">
            <div class="container-xxl">
              <!-- Logo -->
                <a class="navbar-brand" href="TeacherDash.php">
                    <img src="../images/enser logo.png" alt="Logo" style="width: 50px" style="height: 50px">
                </a>
                <h1 class="brand-text">nser</h1>
              <!--End of logo-->
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false"
              aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                  <ul class="navbar-nav">
                        <li class="nav-item">
                        <!--Until formating can be fixed
                            <span class="material-symbols-outlined">
                            logout
                        </span>-->
                        <a class="nav-link" href="logout.php">SIGN OUT</a>
                  </ul>
              </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-sm-4 text-left p-4">
                <h2>Teacher Dashboard</h2>
            </div>
        </div>
<!--The end of the navbar-->
<!--This is the beggining of the sidebar-->
        <div>
        <!--Things to the right of the navbar--> 
            <div class="content-to-right">
                <div class="container">
                    <p>Hi <?php echo $_SESSION['username'],$_SESSION['instructor_id']?></p>
                    <input type="text" id ="fromUser" value=<?php echo $_SESSION["instructor_id"];?> hidden />
                </div>
                <div class="people">
                    <p>Send message to: </p>
                    <ul>
                        <?php
                            while($row=mysqli_fetch_assoc($all_classes)){
                                echo'<li><a href="?toUser=' .$row["id"].'">'.$row["teacher_username"].' (Teacher)</a></li>';
                            }

                            $sql = "SELECT * FROM students";
                            $all_classes = $conn->query($sql);

                            while($row=mysqli_fetch_assoc($all_classes)){
                                echo'<li><a href="?toUser=' .$row["id"].'">'.$row["student_username"].' (Student)</a></li>';
                            }

                            $sql = "SELECT * FROM stakeholders";
                            $all_classes = $conn->query($sql);

                            while($row=mysqli_fetch_assoc($all_classes)){
                                echo'<li><a href="?toUser=' .$row["id"].'">'.$row["stakeholder_username"].' (Stakeholder)</a></li>';
                            }
                        ?>
                    </ul>

                </div>
                <div class="col-md-4">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>
                                    <?php
                                        if(isset($_GET["toUser"])){
                                            $Teacher_Username = "SELECT * FROM teachers WHERE id = '".$_GET["toUser"]."' ";
                                            $TC = $conn->query($Teacher_Username); 
                                            $uName = mysqli_fetch_assoc($TC);
                                            echo '<input type="text" value='.$_GET["toUser"].' id="toUser" hidden/>';
                                            echo $uName["teacher_username"];
                                        }else{
                                            $Teacher_Username = "SELECT * FROM teachers";
                                            $TC = $conn->query($Teacher_Username); 
                                            $uName = mysqli_fetch_assoc($TC);
                                            $_SESSION["toUser"] = $uName["id"];
                                            echo '<input type="text" value='.$_SESSION["toUser"].' id="toUser" hidden/>';
                                            echo $uName["teacher_username"];
                                        }
                                    ?>
                                </h4>
                            </div>
                            <div class="modal-body" id="msgBody" style="height:400px; width:1000px; overflow-y: scroll; overflow-x:hidden;">
                                <?php
                                    if(isset($_GET["toUser"])){
                                        $chats = "SELECT * FROM messages WHERE(FromUser = '".$_SESSION["instructor_id"]."' AND ToUser = '".$_GET["toUser"]."') OR (FromUser='".$_GET["toUser"]."' AND ToUser = '".$_SESSION["instructor_id"]."')";
                                        $messages = $conn->query($chats); 
                                        $chat = mysqli_fetch_assoc($messages);
                                    }else{
                                        $chats = "SELECT * FROM messages WHERE(FromUser = '".$_SESSION["instructor_id"]."' AND ToUser = '".$_SESSION["toUser"]."') OR (FromUser='".$_SESSION["instructor_id"]."' AND ToUser = '".$_SESSION["toUser"]."')";
                                        $messages = $conn->query($chats); 
                                        while($chat = mysqli_fetch_assoc($messages)){
                                            if($chat["FromUser"]==$_SESSION["instructor_id"]){
                                                echo"<div style='text-align:right;'>
                                                    <p style='background-color:lightblue; word-wrap:break-word;display:inline-block; padding:5px; border-radius:10px; max width:70%;'>
                                                        ".$chat["Message"]."
                                                    </p>
                                                </div>";
                                            }else{
                                                    echo"<div style='text-align:left;'>
                                                    <p style='background-color:yellow; word-wrap:break-word;display:inline-block; padding:5px; border-radius:10px; max width:70%;'>
                                                        ".$chat["Message"]."
                                                    </p>
                                                </div>";   
                                            }
                                        }  
                                    }
                                ?>
                            </div>
                            <div class="modal-footer">
                                <textarea id="message" class="form-control" style="height: 70px; width:1000px;"></textarea>
                                <button id="send" class="btn btn-primary" style="height: 70%;">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--The end of the things to the right nabar-->
            <div class="sidebar">
                <a href="TeacherDash.php">
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>
                    <p>Dashboard</p>
                </a>
                <a href="TeacherStudents.php">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                    <p>Students</p> 
                </a>
                <a href="TeacherCourses.php">
                    <span class="material-symbols-outlined">
                        school
                    </span>
                    <p>Courses</p> 
                </a>
                <a href="TeacherProject.php">
                    <span class="material-symbols-outlined">
                        deployed_code
                    </span>
                    <p>Projects</p> 
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        volunteer_activism
                    </span>
                    <p>Stakeholders</p> 
                </a>
                <a href="Teacher_Message.php" class="active">
                    <span class="material-symbols-outlined">
                        chat
                    </span>
                    <p>Message</p> 
                </a>
        </div>           
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#send").on("click",function(){
                $.ajax({
                    url:"insertMessage.php",
                    method:"POST",
                    data:{
                        fromUser: $("#fromUser").val(),
                        toUser: $("#toUser").val(),
                        message: $("#message").val(),
                    },
                    
                    dataType:"text",
                    success:function(data){
                        $("#message").val("");
                    }
                });
            });
            setInterval(function(){
                $.ajax({
                    url:"realTimeChat.php",
                    method:"POST", 
                    data:{
                        fromUser:$("#fromUser").val(),
                        toUser:$("#toUser").val()
                    },
                    dataType:"text",
                    success:function(data){
                        $("#msgBody").html(data);
                    }
                });
            }, 700);
        });
    </script>
</html>