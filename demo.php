<?php

session_start();

include "config2.php";
include "./models/db.php"


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div class="products">

<?php

//current URL of the Page. cart_update.php redirects back to this URL

$current_url = utf8_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

    

    $results = $mysqli->query("SELECT * FROM products ORDER BY id ASC");

    if ($results) {

        //output results from database

        while($obj = $results->fetch_object())

        {

            

            echo '<div class="product">';

            echo '<form method="post" action="cart_update.php">';

            echo '<div class="product-thumb"><img src="images/'.$obj->image.'"></div>';

            echo '<div class="product-content"><h3>'.$obj->name.'</h3>';

            echo '<div class="product-info">Price '.$obj->price.$currency.' <button class="add_to_cart">Add To Cart</button></div>';

            echo '</div>';

            echo '<input type="hidden" name="type" value="add" />';

            echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';

            echo '</form>';

            echo '</div>';

        }
}

?>

</div>