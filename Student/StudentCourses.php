<?php
    include("authconnection.php");
    require_once ('../connection.php');
    $Sid = $_SESSION["student_id"];
    $sql = "SELECT classes.*
    FROM classes
    LEFT JOIN enrollment ON classes.id = enrollment.classid AND enrollment.studentid = $Sid
    WHERE enrollment.classid IS NULL";
    $all_classes = $conn->query($sql);
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $enroll = "INSERT INTO enrollment (classid,studentid,enrolled) VALUES ($id, '".$_SESSION['student_id']."' ,1) ";
        $conn->query($enroll);
        header("Location: StudentCourses.php");
        exit();
    }
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
                <a class="navbar-brand" href=" ">
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
                <h2>Available Course</h2>
            </div>
        </div>
<!--The end of the navbar-->
<!--This is the beggining of the sidebar-->
        <div>
        <!--Things to the right of the navbar-->
            <div class="content-to-right">
            <input class="form-control" id="myInput" type="text" placeholder="Search..">

            <table class="table" class="custom-table">
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Description</th>
                        <th>Professor</th>
                        <th>Location</th>
                        <th>Skilles learned</th>
                        <th>Enroll</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="myTable">

                <?php
                    while($row = mysqli_fetch_assoc($all_classes)){
                ?>
                <tr>
                    <td><?php echo $row["course_name"] ?></td>
                    <td><?php echo $row["course_desc"] ?></td>
                    <td><?php echo $row["Instructor"] ?></td>
                    <td><?php echo $row["Location"] ?></td>
                    <td><?php echo $row["skills_learned"] ?></td>
                    <td>
                    <a class="btn btn-primary" href='StudentCourses.php?id=<?php echo $row["id"]; ?>'>Enroll</a>
                    </td>
                </tr>
                <?php
                    }
                ?>

                </tbody>
            </table>
            </div>
        <!--The end of the things to the right nabar-->
            <div class="sidebar">
            <a href="StudentDash.php">
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>
                    <p>Dashboard</p>
                </a>
                <a href="#">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                    <p>User</p> 
                </a>
                <a href="StudentCourses.php" class="active">
                    <span class="material-symbols-outlined">
                        school
                    </span>
                    <p>Courses</p> 
                </a>
                <a href="StudentInstructors.php">
                    <span class="material-symbols-outlined">
                        design_services
                    </span>
                        <p>Instructors</p> 
                </a>
                <a href="StudentMessages.php">
                    <span class="material-symbols-outlined">
                        chat
                    </span>
                    <p>Message</p> 
                </a>
<!-- TEMP TAKEOUT
                <a href="#">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <p>Logout</p> 
                </a>
            </div>
-->

        </div>
        <!--This is the end of the sidebar--> 
           
    </body>
    <script>
        $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
</html>