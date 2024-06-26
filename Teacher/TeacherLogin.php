<?php
    include('../connection.php');
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
                <a class="navbar-brand" href="TeacherLogin.php">
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
                        <a class="nav-link" href="TeacherRegister.php">SIGN UP</a>
                        <li class="nav-item">
                        <a class="nav-link" href="../Student/StudentLogin.php">STUDENT</a>
                        <li class="nav-item">
                        <a class="nav-link" href="../Stakeholder/StakeholderLogin.php">STAKEHOLDER</a>
                  </ul>
              </div>
            </div>
        </nav>

        <?php
                session_start();
            // When form submitted, check and create user session.
            if (isset($_POST['username'])) {
                $username = stripslashes($_REQUEST['username']);    // removes backslashes
                $username = mysqli_real_escape_string($conn, $username);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($conn, $password);
                // Check user is exist in the database
                $query    = "SELECT * FROM `teachers` WHERE teacher_username='$username'
                     AND teacher_password='" . md5($password) . "'";
                $result = mysqli_query($conn, $query);
                $rows = mysqli_num_rows($result);

                if ($rows == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $username;
                    $_SESSION['last_name'] = $row['teacher_last'];
                    $_SESSION['instructor_id'] = $row['id'];
                    // Redirect to user dashboard page
                    header("Location: TeacherDash.php");
                } else {
                echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='TeacherLogin.php'>Login</a> again.</p>
                  </div>";
                }
            } else {
        ?>

        <form class = "form" action="" method="post">
            <h1>Teacher Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required/>
            <input type="text" class="login-input" name = "email" placeholder="Email">
            <input type="password" class="login-input" name = "password" placeholder="Password"required>
            <input type="submit" name="submit" value="Login" class="login-button">
        </form>

        <?php
            }
        ?>

    </body>
</html>