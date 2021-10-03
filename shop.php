<?php
// Starting session
session_start();
// Include config file
require_once "config.php";

//token for authentication when purchasing
$token = bin2hex(random_bytes(16));



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Home</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <h4>Shopping Cart</h4>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h4>Log in</h4>
            <input type="hidden" value="<?php echo $token; ?>" />

            <div class="form-group mt-4">
                <label>Full name</label>
                <input type="text" name="f_name" class="form-control">
            </div>

            <div class="form-group mt-4">
                <label>Credit car number</label>
                <input type="number" name="cc_nbr" class="form-control">
            </div>

            <div class="form-group mt-4">
                <label>Expiration date</label>
                <input type="month" name="exp_date" class="form-control">
            </div>

            <div class="form-group mt-4">
                <label>CCV</label>
                <input type="number" name="ccv" class="form-control">
            </div>

            <div class="form-group mt-4">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            
        </form>
        
    </div>

    </div>

    <footer class="page-footer">
        <p>Security Shop</p>
    </footer>


</body>

</html>
<script src="./js/scripts.js"></script>