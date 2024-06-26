
<?php
    require_once ('../connection.php');
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
                <a class="navbar-brand" href="TeacherRegister.php">
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
                        <a class="nav-link" href="TeacherLogin.php">SIGN IN</a>
                        <li class="nav-item">
                        <a class="nav-link" href="../Student/StudentRegister.php">STUDENT</a>
                        <li class="nav-item">
                        <a class="nav-link" href="../Stakeholder/StakeholderRegister.php">STAKEHOLDER</a>
                  </ul>
              </div>
            </div>
        </nav>

        <?php
            // When form submitted, insert values into the database.
            if (isset($_REQUEST['username'])) {
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($conn, $username);

                $checkQuery = "SELECT * FROM `teachers` WHERE teacher_username='$username'
                UNION
                SELECT * FROM `stakeholders` WHERE stakeholder_username='$username'
                UNION
                SELECT * FROM `students` WHERE student_username='$username'";

                $checkResult = mysqli_query($conn, $checkQuery);
                $existingRows = mysqli_num_rows($checkResult);
                
                $email    = stripslashes($_REQUEST['email']);
                $email    = mysqli_real_escape_string($conn, $email);
                
                $first = stripslashes($_REQUEST['firstname']);
                $first = mysqli_real_escape_string($conn, $email);
                
                $last = stripslashes($_REQUEST['lastname']);
                $last = mysqli_real_escape_string($conn, $last);

                $sex = stripslashes($_REQUEST['Sex']);
                $sex = mysqli_real_escape_string($conn, $sex);
                
                $state = stripslashes($_REQUEST['State']);
                $state = mysqli_real_escape_string($conn, $state);

                $town = stripslashes($_REQUEST['Town']);
                $town = mysqli_real_escape_string($conn, $town);

                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($conn, $password);

                if ($existingRows > 0) {
                    // Username already exists, show an error message
                    echo "<div class='form'>
                        <h3>Username already in use. Choose another username.</h3><br/>
                        <p class='link'>Click here to <a href='TeacherRegister.php'>registration</a> again.</p>
                        </div>";
                } else {
                    $query    = "INSERT into `teachers` (teacher_username,teacher_first,teacher_last,teacher_email,teacher_password,teacher_sex, teacher_state,teacher_town)
                        VALUES ('$username','$first','$last','$email', '" . md5($password) . "','$sex','$state','$town')";
                    $result   = mysqli_query($conn, $query);
                    if ($result) {
                        echo "<div class='form'>
                           <h3>You are registered successfully.</h3><br/>
                           <p class='link'>Click here to <a href='TeacherLogin.php'>Login</a></p>
                           </div>";
                       } else {
                           echo "<div class='form'>
                           <h3>Required fields are missing.</h3><br/>
                           <p class='link'>Click here to <a href='TeacherRegister.php'>registration</a> again.</p>
                           </div>";
                       }
                }
                
    } else {
        ?>

        <form class = "form" action="" method="">
            <h1>Teacher Sign Up</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required/>
            <input type="text" class="login-input" name="firstname" placeholder="First Name" required/>
            <input type="text" class="login-input" name="lastname" placeholder="Last Name" required/>
            <input type="text" class="login-input" name="email" placeholder="Email Address"required>
            <input type="text" class="login-input" name="Sex" placeholder="Sex">
            <input type="text" class="login-input" name="State" placeholder="Current State">
            <input type="text" class="login-input" name="Town" placeholder="Current Town">
            <input type="password" class="login-input" name = "password" placeholder="Password">
            <input type="submit" name="submit" value="Register" class="login-button">
        </form>
        <?php
            }
        ?>
    </body>
</html>