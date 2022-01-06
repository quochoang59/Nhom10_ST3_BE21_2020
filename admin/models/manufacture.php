<?php
class Manufacture extends Db{
    public function getManuCount()
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) as count FROM manufactures ");
         $sql->execute(); //return an object
        
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an
    }
    public function getAllManu(){
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductByManuId($manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function get1ProductByManuId($manu_id,$page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ? LIMIT ?, ?");
        $sql->bind_param("iii", $manu_id,$firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
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
    public function addManufacture($name)
    {
        $sql = self::$connection->prepare("INSERT INTO `manufactures`(`manu_name`) VALUES (?)");
        $sql->bind_param("s", $name);
        return $sql->execute(); //return an object
    }
    public function delManufacture($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `manufactures` WHERE `manu_id`=?");
        $sql->bind_param("i", $id);
        return $sql->execute(); //return an object
    }
    public function getManufactureById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures WHERE manu_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an
    }
    public function editManufacture($name,$id)
    {
        $sql = self::$connection->prepare("UPDATE `manufactures` SET `manu_name` = ?
        WHERE `manu_id` = ?");
        $sql->bind_param("si", $name,$id);
        return $sql->execute(); //return an object
    }
}
 ?>