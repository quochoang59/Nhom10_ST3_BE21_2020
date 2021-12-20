
<?php
 require "config.php";
 require "models/db.php";
 require "models/product.php";
 require "models/manufacture.php";
 require "models/protype.php";

 $protype = new Protype;

 if(isset($_POST['submit'])){
     $name = $_POST['name'];
     $protype->addProtype($name);
 
 }
 else{
     echo "0";
 }
 header('location:protypes.php');