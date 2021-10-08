<?php
// Starting session
session_start();

require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
$attemps_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        // Prepare a select statement
        $sql = "SELECT password,attempts FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);
            }
        }
    }

    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_bind_result($stmt, $pw, $att);
        mysqli_stmt_fetch($stmt);
        $trys = 5;
        if ($att <= $trys) {
            if (password_verify($_POST['password'], $pw)) {
                $att = 0;
                $attemps_error = "";

                // Prepare a select statement
                $sql = "UPDATE users SET attempts = ? WHERE username = ?";
                if ($stmt = mysqli_prepare($link, $sql)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "is", $attempts, $param_username);
                    $attempts = $att;
                    $param_username = trim($_POST["username"]);
                    mysqli_stmt_execute($stmt);
                }

                session_regenerate_id();
                //SET SESSION VARS.
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                echo 'Hello ' . $_SESSION['name'];
                header('Location: index.php');
            } else {
                // Incorrect password
                $att = $att + 1;

                // Prepare a select statement
                $sql = "UPDATE users SET attempts = ? WHERE username = ?";
                if ($stmt = mysqli_prepare($link, $sql)) {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "is", $attempts, $param_username);
                    $attempts = $att;
                    $param_username = trim($_POST["username"]);
                    mysqli_stmt_execute($stmt);
                    $attemps_error = "You have failed to login " . $att . " times, " . $trys - $att . " attempts left!";
                }

                $username_err = 'Incorrect username and/or password!';
                $password_err = 'Incorrect username and/or password!';
            }
        } else {
            $attemps_error = "Account is locked, to many tries!";
        }
    } else {
        // Incorrect password
        $username_err = 'Incorrect username and/or password!';
        $password_err = 'Incorrect username and/or password!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="./css/master.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Login</title>
</head>

<body>

    <?php
    include 'navbar.php';
    ?>

    <div class="container">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Log in</h2>
            <p> <?php echo $attemps_error; ?></p>
            <input id="login_token" type="hidden" value="<?php echo $token; ?>" />

            <div class="form-group mt-4">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" required>
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group mt-4">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" required>
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group mt-4">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p class="mt-4"> No account? <a href="register.php">Register here</a>.</p>
        </form>

    </div>

    <footer class="page-footer">

        <p>Security Shop</p>

    </footer>


</body>

</html>
<script src="./js/scripts.js"></script>