
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
                <a class="navbar-brand" href="StakeholderRegister.php">
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
                        <a class="nav-link" href="StakeholderLogin.php">SIGN IN</a>
                        <li class="nav-item">
                        <a class="nav-link" href="../Teacher/TeacherRegister.php">TEACHER</a>
                        <li class="nav-item">
                        <a class="nav-link" href="../Student/StudentRegister.php">STUDENT</a>
                  </ul>
              </div>
            </div>
        </nav>

        <?php
            // When form submitted, insert values into the database.
            if (isset($_REQUEST['username'])) {
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($conn, $username);
                
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
                $query    = "INSERT into `stakeholders` (stakeholder_username,stakeholder_first,stakeholder_last,stakeholder_email,stakeholder_password,stakeholder_sex, stakeholder_state,stakeholder_town)
                     VALUES ('$username','$first','$last','$email', '" . md5($password) . "','$sex','$state','$town')";
                $result   = mysqli_query($conn, $query);
                if ($result) {
                 echo "<div class='form'>
                    <h3>You are registered successfully.</h3><br/>
                    <p class='link'>Click here to <a href='StakeholderLogin.php'>Login</a></p>
                    </div>";
                } else {
                    echo "<div class='form'>
                    <h3>Required fields are missing.</h3><br/>
                    <p class='link'>Click here to <a href='StakeholderRegister.php'>registration</a> again.</p>
                    </div>";
        }
    } else {
        ?>

        <form class = "form" action="" method="">
            <h1>Stakeholder Sign Up</h1>
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