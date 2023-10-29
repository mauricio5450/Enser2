
<?php
    require_once ('../connection.php');
    
    if(isset($_POST["submit"])){
        $projectname = $_POST["pname"];
        $projectdesc = $_POST["pdesc"];
        $projectstakeholder = $_POST["pstakeholder"];
        $projectloc = $_POST["ploc"];
        $projectskills = $_POST["pskills"];
        
        
        $upload_dir = "projectimg/";
        $projimg = $upload_dir.$_FILES["image"]["name"];
        $upload_dir.$_FILES["image"]["name"];
        $upload_file = $upload_dir.basename($_FILES["image"]["name"]);
        $imagetype = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));
        $check = $_FILES["image"]["size"];
        $upload_ok = 0;

        if(file_exists($upload_file)){
            $upload_ok = 2;
        }else{
            $upload_ok = 1;
            if($check !== false){
                $upload_ok = 1;
                if($imagetype == 'jpg'||$imagetype == 'png'||$imagetype == 'jpeg'){
                    $upload_ok = 1;
                }else{
                    echo'<script>alert("Please change the image format")</script>';
                }
            }else{
                echo '<script>alert("The phot size is 0 please change the photo")</script>';
                $upload_ok = 0;
            }
        }
        if($upload_ok == 0){
            echo'<script>alert("Sorry your file is not uploaded please try again!")</script>';
        }else if($upload_ok==2){
            if($projectname!=""&&$projectdesc!=""&&$projectstakeholder!=""&&$projectskills!=""&&$projectloc!=""){
                $sql = "INSERT INTO projects(project_name,project_desc,project_loc,project_stakeholder,project_skills,project_img) 
                VALUES('$projectname','$projectdesc','$projectloc','$projectstakeholder','$projectskills','$projimg')";
                if($conn->query($sql)==TRUE){
                    echo "<script>alert('your image uploaded succesfully')</script>";
                }
            }
        }else{
            if($projectname!=""&&$projectdesc!=""&&$projectstakeholder!=""&&$projectskills!=""&&$projectloc!=""){
                move_uploaded_file($_FILES["image"]["tmp_name"],$upload_file);
                $sql = "INSERT INTO projects(project_name,project_desc,project_loc,project_stakeholder,project_skills,project_img) 
                VALUES('$projectname','$projectdesc','$projectloc','$projectstakeholder','$projectskills','$projimg')";
                if($conn->query($sql)==TRUE){
                    echo "<script>alert('your image uploaded succesfully')</script>";
                }
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
                        <a class="nav-link" href="../Login.php">SIGN OUT</a>
                  </ul>
              </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-sm-4 text-right p-4">
                <h2 class="movin">Create Project</h2>
            </div>
        </div>
<!--The end of the navbar-->
<!--This is the beggining of the sidebar-->
        <div>
        <!--Things to the right of the navbar-->
            <div class="content-to-right">

            <form action="CreateProject.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group" >
                        <label>Project Name:</label>
                        <input name="pname" class="form-control custom-input">
                    </div>

                    <div class="form-group" >
                        <label>Project Description:</label>
                        <input name="pdesc" class="form-control custom-input">
                    </div>

                    <div class="form-group" >
                        <label>Location:</label>
                        <input name="ploc" class="form-control custom-input">
                    </div>

                    <div class="form-group" >
                        <label>Stakeholder:</label>
                        <input name="pstakeholder" class="form-control custom-input">
                    </div>

                    <div class="form-group" >
                        <label>Skills Learned:</label>
                        <input name="pskills" class="form-control custom-input">
                    </div>

                    <div class="form-group">
                        <label>Select image to upload as a class picture: </label>
                        <input type="file" name="image"/>
                    </div>

                    <input type="submit" class="btn btn-primary" name="submit">
                </form>

            </div>
        <!--The end of the things to the right nabar-->
            <div class="sidebar">
                <a href="StakeholderDash.php">
                    <span class="material-symbols-outlined">
                        dashboard
                    </span>
                    <p>Dashboard</p>
                </a>
                <a href="StakeholderStudents.php">
                    <span class="material-symbols-outlined">
                        person
                    </span>
                    <p>Students</p> 
                </a>
                <a href="StakeholderCourses.php">
                    <span class="material-symbols-outlined">
                        school
                    </span>
                    <p>Courses</p> 
                </a>
                <a href="StakeholderProject.php">
                    <span class="material-symbols-outlined">
                        deployed_code
                    </span>
                    <p>Projects</p> 
                </a>
                <a href="StakeholderInstructors.php">
                    <span class="material-symbols-outlined">
                        design_services
                    </span>
                        <p>Instructors</p> 
                </a>
                <a href="StakeholderStake.php">
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