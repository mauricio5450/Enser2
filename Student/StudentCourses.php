<?php
    include("authconnection.php");
    require_once ('../connection.php');
    $sql = "SELECT *
            FROM classes";
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
                <tbody>

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
                    <a class="btn btn-primary" onclick= "Enroll(<?php echo $row['id'] ?>)">Enroll</a>
                    </td>
                    <script>
                        function Enroll(classId) {
                            var studentId = <?php echo $_SESSION('student_id'); ?>; // Replace with the actual way you get the student ID

                            $.ajax({
                                type: 'POST',
                                url: 'enroll.php', // Create a new PHP file (enroll.php) to handle enrollments
                                data: { classId: classId, studentId: studentId },
                                success: function(response) {
                                    // Handle the response, e.g., show a success message or update the UI
                                    console.log(response);
                                },
                                error: function(error) {
                                    // Handle errors, e.g., show an error message
                                    console.error(error.responseText);
                                }
                            });
                        }
                    </script>
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
                <a href="StudentPast.php">
                    <span class="material-symbols-outlined">
                        history
                    </span>
                    <p>Past Courses</p> 
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