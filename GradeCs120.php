<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
<!--The beginning of the navbar-->
        <nav class="navbar navbar-expand-sm navbar">
            <div class="container-xxl">
              <!-- Logo -->
                <a class="navbar-brand" href=" ">
                    <img src="images/enser logo.png" alt="Logo" style="width: 50px" style="height: 50px">
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
                        <a class="nav-link" href="Login.php">SIGN OUT</a>
                  </ul>
              </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-sm-4 text-left p-4">
                <h2>CS120</h2>
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
                        <th>Assignment</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Assignment #1</td>
                    <td>89%</td>
                </tr>
                <tr>
                    <td>Quiz #1</td>
                    <td>78%</td>
                </tr>
                <tr>
                    <td>Test #1</td>
                    <td>91%</td>
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
                <h5 class="title">Class Items</h5>
                <a href="#">
                    <span class="material-symbols-outlined">
                        edit_note
                    </span>
                    <p>Assignment</p> 
                </a>
                <a href="StudentCourses.php">
                    <span class="material-symbols-outlined">
                        quiz
                    </span>
                    <p>Quiz</p> 
                </a>
                <a href="StudentInstructors.php">
                    <span class="material-symbols-outlined">
                        lab_profile
                    </span>
                        <p>Test</p> 
                </a>
                <a href="StudentPast.php">
                    <span class="material-symbols-outlined">
                        abc
                    </span>
                    <p>Grade</p> 
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