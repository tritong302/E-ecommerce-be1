<?php 
class ProductType extends Model{
    public function getProductType(){
        $sql = parent::$connection->prepare("SELECT * FROM product_type ");
        return parent::select($sql);
    }

    public function getProtypes_theoProductType($id_product_type){
        $sql = parent::$connection->prepare("SELECT * FROM protypes WHERE product_type_id = $id_product_type");
        return parent::select($sql);
    }
    public function getProducTypeById($id)
    {
       //return an array
        $sql = parent::$connection->prepare('SELECT * FROM `product_type` WHERE product_type_id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function addProductType($name){
        $sql = parent::$connection->prepare("INSERT INTO `product_type`( `name_product_type`) VALUES (?)");
        $sql->bind_param("s",$name);
        $sql->execute();
    }
    public function updateProductType($id_product_type, $name){
        $sql = parent::$connection->prepare("UPDATE `product_type` SET name_product_type = ? WHERE product_type_id = ?");
        $sql->bind_param("si", $name, $id_product_type);
        $sql->execute();
    }
    public function deleteProducType($id_product_type){
        $sql = parent::$connection->prepare("DELETE FROM `product_type` WHERE product_type_id = ?");
        $sql->bind_param("i",$id_product_type);
        $sql->execute();

    }

}