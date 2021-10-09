<?php
    require_once 'config.php';
    global $link;

    function getCart($link){

           
        $result = $link->query('SELECT *
                                FROM Products');
                        

        $cartArray = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cartArray[] = $row;
            }
        }

    return $cartArray;
}
function cartProductRow($image, $name, $price, $id) {
    $row = "
            <div class='cart-content'>
                <div class='cart-img'><img src='resource/img/$image.jpg' height='50' width='50'></div>
                <div class='cart-p-name'>$name</div>
                <div class='cart-p-price'>$price kr</div>
                <div class=''cart-p-form>
                    <form method='post' action='shop.php?action=remove&id=$id'>
                        <button type='submit' name='remove'>Remove</button>
                    </form>
                </div>
            </div>
    ";

    echo $row;
}


function ReceiptProductRow($image, $name, $price, $id) {
    $row = "
            <div class='cart-content'>
                <div class='cart-img'><img src='resource/img/$image.jpg' height='50' width='50'></div>
                <div class='cart-p-name'>$name</div>
                <div class='cart-p-price'>$price kr </div>
                <div class=''cart-p-form>
                </div>
            </div>
    ";

    echo $row;
}

function getProducts($link){
    $sql = "SELECT *
            FROM products";
    $result = $link->query($sql);
    if(($result->num_rows) > 0) {
        return $result;
    }
}

?>