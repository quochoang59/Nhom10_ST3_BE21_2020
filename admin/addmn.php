<?php
 require "config.php";
 require "models/db.php";
 require "models/product.php";
 require "models/manufacture.php";
 require "models/protype.php";

 $manu = new Manufacture;


 if(isset($_POST['submit'])){
     $name = $_POST['name'];
     
     $manu->addManufacture($name); 
 }
 else{
     echo "0";
 }
 header('location:manufactures.php');