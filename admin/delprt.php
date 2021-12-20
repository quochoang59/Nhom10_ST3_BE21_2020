<?php
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
require "models/manufacture.php";
$manufacture = new Manufacture;
require "models/protype.php";
$protype = new protype;

if(isset($_GET['type_id'])){
    $protype->delProtypes($_GET['type_id']);
    header('location:protypes.php');
}