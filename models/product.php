<?php
class Product extends Db
{
    public function getAllProducts5()
    {
        $sql = self::$connection->prepare("SELECT * FROM products order by id desc limit 0,5");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an
    }
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an
    }
    public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` like ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an
    }

    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products,manufactures,protypes
        WHERE products.manu_id = manufactures.manu_id 
        AND products.type_id = protypes.type_id
        ORDER BY `id` DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    
    
}
