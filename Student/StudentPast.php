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
                        <a class="nav-link" href="../Login.php">SIGN OUT</a>
                  </ul>
              </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-sm-4 text-left p-4">
                <h2>Student's Past Courses</h2>
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
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>State</th>
                        <th>City/Town</th>
                        <th>Sex</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>CS 50</td>
                    <td>This is the fundamental basics to Computer Science</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>Montana</td>
                    <td>Helena</td>
                    <td>Male</td>
                </tr>
                <tr>
                    <td>ECE 101</td>
                    <td>This is the basics of ECE</td>
                    <td>Jane</td>
                    <td>Doe</td>
                    <td>Jane@example.com</td>
                    <td>Idaho</td>
                    <td>Boise</td>
                    <td>Female</td>
                </tr>
                
                <tr>
                    <td>MATH 330</td>
                    <td>This is Linear Algebra</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>Montana</td>
                    <td>Helena</td>
                    <td>Male</td>
                </tr>

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
                <a href="StudentPast.php" class="active">
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