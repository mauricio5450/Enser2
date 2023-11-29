<?php
    include("authconnection.php");
    require_once ('../connection.php');
    $professor = intval($_SESSION['instructor_id']);
    $sql = "SELECT *
            FROM classes
            WHERE classes.instructor_id = $professor";
    $all_classes = $conn->query($sql);
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
                <button type="button" class="btn btn-primary btn-block custom-butt"><a href="Createclass.php" class="Butt-Cust">Create Class</a></button>
                <div class="container">
                    <div class="row">
                        <?php
                            while($row = mysqli_fetch_assoc($all_classes)){
                        ?>
                        <div class="col-sm-6">
                            <div class="card" style="width:400px">
                                <img class="card-img-top" src="<?php echo $row["course_image"] ?>" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $row["course_name"] ?></h4>
                                    <p class="card-text">Professor: <?php echo $row["Instructor"] ?></p>
                                    <a class="btn btn-primary" onclick= "selectClassAndRedirect(<?php echo $row['id'] ?>)">See class</a>
                                    
                                    <form action = "delete.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                                        <input type="submit" name ="delete" class="btn btn-danger" value="Delete">
                                    </form>

                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <script>
                function selectClassAndRedirect(classID) {
                    // Use AJAX to send the selected class ID to the server
                    // Update the session variable without reloading the page
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', 'authconnection.php?class_id=' + classID, true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Redirect to the specified destination
                            window.location.href = 'TeacherClass.php';
                        }
                    };
                    xhr.send();
                }
            </script>
        <!--The end of the things to the right nabar-->
            <div class="sidebar">
                <a href="TeacherDash.php" class="active">
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
        </div>           
    </body>
</html>