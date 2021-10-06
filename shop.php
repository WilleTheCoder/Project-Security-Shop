<?php
// Starting session
session_start();
// Include config file
require_once "config.php";
require "functions.php";

global $link;
//token for authentication when purchasing
$token = bin2hex(random_bytes(16));

// foreach($_SESSION['cart'] as $key => $value) { // get key(index) and value(productid in cart)
//     if($value['product_id'] == $_GET['id']) { // compare if the value in array is the same as form to be removed
//         unset($_SESSION['cart'][$key]);
//         echo "<script> alert('Product removed');</script>";
//         echo "<script> window.location = 'cart.php';</script>";
//     }
// }

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
    <title>Home</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container">
        <h2>Shopping Cart</h2>
        <div>
        <?php
                    $total_price = 0;
                    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        $result = getProducts($link);
                        //echo "<div class='cart-display'>";
                        while($row = $result->fetch_assoc()) {
                            foreach($product_id as $id) {
                                if($row['id'] == $id) {
                                    $total_price += $row['price'];
                                    cartProductRow($row['img'], $row['product_name'], $row['price'], $row['id']);
                                }
                            }
                        }
                        echo "
                        </div>
                        <div style='margin-left: 100px;'>
                            <div>Total items: ".count($_SESSION['cart'])."</div>
                            <div>Total price: ".$total_price."
                        </div>";

                    } else {
                        echo "cart is empty";
                    }
                    $_SESSION['total_price'] = $total_price;
                ?>
            </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Cart</h2>
            <input id="cart-res" type="hidden" value="<?php echo $token; ?>" />

            <div class="form-group mt-4">
                <label>Full name</label>
                <input type="text" name="f_name" class="form-control">
            </div>

            <div class="form-group mt-4">
                <label>Credit card number</label>
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
                <label>Ship to:</label>
                <input type="text" name="address" class="form-control">
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