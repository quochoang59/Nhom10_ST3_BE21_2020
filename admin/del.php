<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
require "models/manufacture.php";
$manufacture = new Manufacture;
require "models/protype.php";
$protype = new protype;
if(isset($_GET['id'])){
    $product->delProduct($_GET['id']);
    header('location:products.php');
}