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
     $manu_id = $_POST['manu'];
     $type_id = $_POST['type'];
     $desc = $_POST['desc'];
    //  $image = $_FILES['image']['name'];
     $price = $_POST['price'];
     $feature = $_POST['feature'];

          if(isset($_FILES['image']['name']))
        {
            
            $image =  $_FILES['image']['name'];

        }else
        {
            $image = $_POST['image'];
        }
     $product->editProduct($name,$image,$price,$manu_id,$type_id,$desc,$feature,$_GET['id']);
    }
     //xy ly load file
     $target_dir = "../img/";
     $target_file = $target_dir . basename($_FILES["image"]["name"]);
     move_uploaded_file($_FILES["image"]["tmp_name"],$target_file);


}
else{
    echo "0";
}
header('location:products.php');