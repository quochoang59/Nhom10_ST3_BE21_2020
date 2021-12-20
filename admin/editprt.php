<?php
 require "config.php";
 require "models/db.php";
 require "models/product.php";
 require "models/manufacture.php";
 require "models/protype.php";
 $product = new Product;
 $manu = new Manufacture;
 $protype = new Protype;

 if(isset($_POST['submit'])){
    if(isset($_GET['id'])){
    $name = $_POST['name'];
    }
     $protype->editProtype($name,$_GET['id']);
    }
else{
    echo "0";
}
header('location:protypes.php');