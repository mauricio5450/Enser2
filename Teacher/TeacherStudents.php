<?php
require_once('../connection.php');
include("authconnection.php");

$selectedClass = intval($_SESSION['selected_class']);

$sql = "SELECT *
        FROM classes
        WHERE classes.id = $selectedClass";
$all_classes = $conn->query($sql);

$ro = mysqli_fetch_assoc($all_classes);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $Delete = "DELETE FROM enrollment WHERE classid = $id";
    $conn->query($Delete);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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
                <h2>Teacher's Students</h2>
            </div>
        </div>
<!--The end of the navbar-->
<!--This is the beggining of the sidebar-->
        <!--Things to the right of the navbar--> 
            <div class="content-to-right">
            <h1><?php echo $ro["course_name"] ?> Students</h1>
            <table class="table" class="custom-table">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>State</th>
                        <th>City/Town</th>
                        <th>Sex</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql2 = "SELECT *
                    FROM students
                    INNER JOIN enrollment ON students.id = enrollment.studentid
                    WHERE enrollment.classid = $selectedClass";
                    $_getstudents = $conn->query($sql2);
                    while($row = mysqli_fetch_assoc($_getstudents)){
                ?>
                <tr>
                    <td><?php echo $row["student_first"] ?></td>
                    <td><?php echo $row["student_last"] ?></td>
                    <td><?php echo $row["student_email"] ?></td>
                    <td><?php echo $row["student_state"] ?></td>
                    <td><?php echo $row["student_town"] ?></td>
                    <td><?php echo $row["student_sex"] ?></td>
                    <td><a class="btn btn-danger" href='TeacherStudents.php?id=<?php echo $ro["id"]; ?>'>Delete</a></td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
            </div>
        <!--The end of the things to the right nabar-->
            <div class="sidebar">
            <a href="TeacherDash.php">
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>
                    <p>Dashboard</p>
                </a>
                <a href="TeacherStudents.php" class="active">
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
                <a href="TeacherStakeholders.php">
                    <span class="material-symbols-outlined">
                        volunteer_activism
                    </span>
                    <p>Stakeholders</p> 
                </a>

                <a href ="TeacherDisplaySyllabus.php">
                    <span class="material-symbols-outlined">
                        summarize
                    </span>
                    <p>Syllabus</p>
                </a>
                <a href ="TeacherSyllabus.php">
                    <span class="material-symbols-outlined">
                        note_add
                    </span>
                    <p>Add Syllabus</p>
                </a>
                <a href ="TeacherAssignment.php">
                    <span class="material-symbols-outlined">
                        assignment
                    </span>
                    <p>Assingmnets</p>
                </a>
                <a href ="TeacherAssignmentCreate.php">
                    <span class="material-symbols-outlined">
                        assignment_add
                    </span>
                    <p>Create Assingmnet</p>
                </a>
                <a href="Teacher_Message.php">
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
</html>