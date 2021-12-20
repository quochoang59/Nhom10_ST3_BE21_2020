<?php 
class User extends Db{
    public function CheckLoginAdmin($username,$password){
        $sql = self::$connection->prepare("SELECT * FROM user WHERE `username`= ? AND `password`= ? AND `role_id`= 0" );

        $password = md5($password);
        $sql->bind_param("ss", $username, $password);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->num_rows;
        if($items == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function CheckLogin($username,$password){
        $sql = self::$connection->prepare("SELECT * FROM user WHERE `username`= ? AND `password`= ? AND `role_id`= 1" );

        $password = md5($password);
        $sql->bind_param("ss", $username, $password);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->num_rows;
        if($items == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    public function CheckRegister($username,$password)
    {
        $password = md5($password);
        $sql = self::$connection->prepare("INSERT INTO user (`username`,`password`) VALUES(?,?)");
        
        $sql->bind_param("ss", $username, $password);
        return $sql->execute();
        $sql->store_result();
        
    }
}