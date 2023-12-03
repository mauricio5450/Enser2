<?php
require_once('../connection.php');
include("authconnection.php");

$selectedClass = intval($_SESSION['selected_class']);

$sql = "SELECT *
        FROM classes
        WHERE classes.id = $selectedClass";
$all_classes = $conn->query($sql);

$row = mysqli_fetch_assoc($all_classes);
$class_name = $row["course_name"];

if (isset($_POST["submit"])) {
    $class_id = $selectedClass;
    $assignment_name = $_POST["assignment_name"];
    $points = $_POST["points"];
    $due_date = $_POST["due_date"];
    $requirements = $_POST["requirements"];

    if ($class_id != "" && $assignment_name != "" && $points != "" && $due_date != "" && $requirements != "" && $class_name != "") {
        $sql = "INSERT INTO assignments (class_id, a_title, a_points, a_date, a_requirements) 
                VALUES ('$class_id','$assignment_name', '$points', '$due_date', '$requirements')";
        if ($conn->query($sql) == TRUE) {
            echo "<script>alert('Your assignment details have been added successfully')</script>";
        }
    }
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
<!-- The beginning of the navbar -->
<nav class="navbar navbar-expand-sm navbar">
    <div class="container-xxl">
        <!-- Logo -->
        <a class="navbar-brand" href=" ">
            <img src="../images/enser logo.png" alt="Logo" style="width: 50px" style="height: 50px">
        </a>
        <h1 class="brand-text">nser</h1>
        <!-- End of logo -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">SIGN OUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-sm-4 text-left p-4">
    </div>
</div>
<!-- The end of the navbar -->
<!-- This is the beginning of the sidebar -->
<!-- Things to the right of the navbar -->
<div class="content-to-right">
    <h1><?php echo $row["course_name"] ?></h1>
    <form action="TeacherAssignmentCreate.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Assignment Name:</label>
            <input name="assignment_name" class="form-control custom-input">
        </div>

        <div class="form-group">
            <label>Points:</label>
            <input name="points" class="form-control custom-input">
        </div>

        <div class="form-group">
            <label>Due Date:</label>
            <input name="due_date" class="form-control custom-input">
        </div>

        <div class="form-group">
            <label>Requirements:</label>
            <input name="requirements" class="form-control custom-input">
        </div>
        <input type="submit" name="submit" class="btn btn-primary">
    </form>
</div>
<!-- The end of the things to the right navbar -->
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
                <a href ="TeacherAssignmentCreate.php" class="active">
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
        </div>
</body>
</html>