<?php
class Email extends Model{
    public function getEmail(){
        $sql = parent::$connection->prepare("SELECT * FROM email ");
        return parent::select($sql);
    }
    public function addEmail($name_email)
    {
        $sql = self::$connection->prepare("INSERT INTO `email` (`email_id`, `name_email`) VALUES (null, ?)");
        $sql->bind_param("s", $name_email);
      return  $sql->execute(); //return an object
          
       // return $items; //return an array
    }
    public function deleteEmail($email_id){
        $sql = parent::$connection->prepare("DELETE FROM `email` WHERE email_id = ?");
        $sql->bind_param("i",$email_id);
        $sql->execute();

    }
}
