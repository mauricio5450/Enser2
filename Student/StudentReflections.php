<?php
    require_once ('../connection.php');
    include('authconnection.php');
    
    
    if(isset($_POST["submit"])){
        $reflection = $_POST["Reflection"];
        $classid = $_SESSION["selected_class"];
        $studentid = $_SESSION["student_id"];
        if($reflection!=""&&$classid!=""&&$studentid!=""){
            $sql = "INSERT INTO reflections(Student_id,Class_id,Reflection) 
            VALUES('$studentid','$classid','$reflection')";
            if($conn->query($sql)==TRUE){
                echo "<script>alert('your reflection uploaded succesfully')</script>";
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
                <h2>Student Reflections</h2>
            </div>
        </div>
<!--The end of the navbar-->
<!--This is the beggining of the sidebar-->
        <div>
        <!--Things to the right of the navbar-->
            <div class="content-to-right">

                <table class="table" class="custom-table">
                    <thead>
                        <tr>
                            <th>Reflection ID</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $selectedClass = $_SESSION["selected_class"];
                    $sid = $_SESSION["student_id"];
                    $sql = "SELECT *
                            FROM reflections
                            WHERE Class_id = $selectedClass AND Student_id= $sid";
                    $all_assignments = $conn->query($sql);


                        while($row = mysqli_fetch_assoc($all_assignments)){
                    ?>
                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><a class="btn btn-primary" onclick= "selectClassAndRedirect(<?php echo $row['id'] ?>)">View Reflection</a></td>
                    </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                    <script>
                        function selectClassAndRedirect(classID) {
                        // Use AJAX to send the selected class ID to the server
                        // Update the session variable without reloading the page
                        let xhr = new XMLHttpRequest();
                        xhr.open('GET', 'authconnection.php?reflection_id=' + classID, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                // Redirect to the specified destination
                                window.location.href = 'ReflectionView.php';
                            }
                        };
                        xhr.send();
                        }
                    </script>
                </table>

                <form action="StudentReflections.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Reflection:</label>
                        <input name="Reflection" class="form-control custom-input">
                    </div>
                    <input type="submit" name = "submit" class="btn btn-primary">
                </form>
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
                <a href="StudentCourses.php">
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
                <a href="StudentReflections.php" class="active">
                    <span class="material-symbols-outlined">
                        upload_file
                    </span>
                    <p>Reflections</p> 
                </a>
                <a href="StudentMessages.php">
                    <span class="material-symbols-outlined">
                        chat
                    </span>
                    <p>Message</p> 
                </a>
                <a href ="StudentSyllabus.php">
                    <span class="material-symbols-outlined">
                        summarize
                    </span>
                    <p>Syllabus</p>
                </a>
                <a href ="StudentAssignments.php">
                    <span class="material-symbols-outlined">
                        assignment
                    </span>
                    <p>Assingmnets</p>
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