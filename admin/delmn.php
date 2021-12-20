<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
$manufacture = new Manufacture;
require "models/protype.php";

if(isset($_GET['manu_id'])){
    $manufacture->delManufacture($_GET['manu_id']);
    header('location:manufactures.php');
}