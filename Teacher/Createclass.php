<?php
    require_once ('../connection.php');
    
    if(isset($_POST["submit"])){
        $coursename = $_POST["course_name"];
        $coursedesc = $_POST["course_desc"];
        $courseinst = $_POST["course_Inst"];
        $courselocation = $_POST["course_location"];
        $courseskills = $_POST["course_skills"];
        
        
        $upload_dir = "../images/";
        echo $upload_dir.$_FILES["course_img"]["name"];
        echo $upload_file = $upload_dir.basename($_FILE["course_img"]["name"]);
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
                        <a class="nav-link" href="../Login.php">SIGN OUT</a>
                  </ul>
              </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-sm-4 text-left p-4">
                <h2>Create Class</h2>
            </div>
        </div>
<!--The end of the navbar-->
<!--This is the beggining of the sidebar-->
        <div>
        <!--Things to the right of the navbar--> 
            <div class="content-to-right">
                <form action="Createclass.php" method="POST">

                    <div class="form-group">
                        <label>Course Name:</label>
                        <input name="course_name" class="form-control custom-input">
                    </div>

                    <div class="form-group">
                        <label>Course Description:</label>
                        <input name="course_desc" class="form-control custom-input">
                    </div>

                    <div class="form-group">
                        <label>Location:</label>
                        <input name="course_location" class="form-control custom-input">
                    </div>

                    <div class="form-group">
                        <label>Instructor:</label>
                        <input name="course_Inst" class="form-control custom-input">
                    </div>

                    <div class="form-group">
                        <label>Skills Learned:</label>
                        <input name="course_skills" class="form-control custom-input">
                    </div>
                    <div class="form-group">
                        <label>Select image to upload as a class picture: </label>
                        <input name="course_img" type="file" name="image"/>
                    </div>
                    <input type="submit" name = "submit" class="btn btn-primary">
                </form>
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
                <a href="TeacherStakeholders.php">
                    <span class="material-symbols-outlined">
                        volunteer_activism
                    </span>
                    <p>Stakeholders</p> 
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