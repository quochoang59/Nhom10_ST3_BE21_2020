<?php
session_start();
include "config2.php";
$id = $_GET["id"];
$sql = "SELECT * FROM products where id = $id";
$result = mysqli_query($conn,$sql);
$product_cart = array();
foreach($result as $value)
{
    $product_cart[$value["id"]] = $value;
}

//echo "<pre>";
//print_r($product_cart[$id]);
if(isset($_POST['addtocart']) )
{
    if(!isset($_SESSION['cart'])||$_SESSION['cart']==null)
    {
        $product_cart[$id]["soluong"] = 1;
        $_SESSION['cart'][$id] = $product_cart[$id];
        //echo "<pre>";
    //print_r($_SESSION['cart'][$id]);
    }
    else
    {
        if(array_key_exists($id,$_SESSION['cart']))
        {
            $_SESSION['cart'][$id]["soluong"] +=1;
            
        }
        else
        {
            $product_cart[$id]["soluong"] = 1;
            $_SESSION['cart'][$id] = $product_cart[$id];
        }
       
    }
    //echo "<pre>";
    //print_r($_SESSION['cart']);
    //session_destroy();
    
    
    header('location:index.php'); 
    
    //header('location:cart_view.php'); 
    
}
?>