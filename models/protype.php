<?php
class Protype extends Db
{
    public function getAllProtype()
    {
        $sql = self::$connection->prepare("SELECT * 
        FROM protypes");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProtypeById($type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
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
    public function get1ProtypeById($type_id,$page, $perPage)
    {
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM products WHERE type_id = ? LIMIT ?, ?"); 
        $sql->bind_param("iii", $type_id,$firstLink, $perPage);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

}