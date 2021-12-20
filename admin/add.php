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
     $name = $_POST['name'];
     $manu_id = $_POST['manu'];
     $type_id = $_POST['type'];
     $desc = $_POST['desc'];
     $image = $_FILES['image']['name'];
     $price = $_POST['price'];
     $feature = $_POST['feature'];
     $crat = $_POST['Created_at'];
     
     $product->addProduct($name,$image,$price,$manu_id,$type_id,$desc,$fea,$crat);
     //xy ly load file
     $target_dir = "../img/";
     $target_file = $target_dir . basename($_FILES["image"]["name"]);
     move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);
    
 }
 else{
     echo "0";
 }
 header('location:products.php');