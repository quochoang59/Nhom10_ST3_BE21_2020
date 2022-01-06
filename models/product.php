<?php
class Product extends Db
{
    public function getProductCount()
    {
        $sql = self::$connection->prepare("SELECT COUNT(id) FROM products; ");
        return $sql->execute(); //return an object
        //$items = array();
        //$items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        //return $items; //return an
    }
    public function getAllProducts5()
    {
        $sql = self::$connection->prepare("SELECT * FROM products order by id desc limit 0,6 ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an
    }
    public function getCheapProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY price ASC limit 3,9 ");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an
    }
    public function getNewProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` ORDER BY YEAR(created_at) DESC, MONTH(created_at) DESC, DAY(created_at) DESC LIMIT 5 ");
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
    public function paginate($url, $total, $perPage)
    {
    $totalLinks = ceil($total/$perPage);
        $link ="";
            for($j=1; $j <= $totalLinks ; $j++)
            {
                $link = $link."</li><a href='$url&page=$j'> $j </a></li>";
            }
            return $link;

    }
    public function search($keyword,$page,$perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` like ? LIMIT ?, ?");
        $keyword = "%$keyword%";
        $sql->bind_param("sii", $keyword,$firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an
    }
    public function search2($keyword)
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

    public function detailProduct($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function get3ProductByManuId($manu_id,$page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ? LIMIT ?, ?");
        $sql->bind_param("iii", $manu_id,$firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function getRelatedProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`, `manufactures` 
        WHERE `products`.`id` = `manufactures`.`manu_id` ORDER BY RAND() LIMIT 0, 4;");
        $sql->execute();//return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    
}
