<?php
class Products extends Model
{
    public function updataProduct($id, $name, $manu_id, $type_id,$product_type, $price, $image, $description, $feature, $created_at)
    {
        $sql = self::$connection->prepare("UPDATE `products` SET name=?, manu_id=?, type_id=?,product_type_id=?, price=?, image=?, description=?, feature=?, created_at=? WHERE id= ?");
        $sql->bind_param("siiiissisi", $name, $manu_id, $type_id,$product_type, $price, $image, $description, $feature, $created_at, $id);
        $sql->execute(); //return an object
    }
    public function deleteProducts($id)
    {
        $sql = self::$connection->prepare("DELETE FROM products  where  id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
    }
    public function insertProduct($name, $manu_id, $type_id,$id_product_type, $price, $image, $description, $feature, $created_at)
    {
        $sql = self::$connection->prepare("INSERT INTO `products` (`id`,`name`, `manu_id`, `type_id`,`product_type_id`, `price`, `image`, `description`, `feature`, `created_at`) VALUES (NULL, ?, ?, ?,?, ?, ?, ?, ?, ?)");
        $sql->bind_param("siiiissis", $name, $manu_id, $type_id,$id_product_type, $price, $image, $description, $feature, $created_at);
        $sql->execute(); //return an object
        $items = array();
        return $items; //return an array
    }
    public function getCountTypeProducts($type_id)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) FROM products WHERE type_id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);     
        return $items; //return an array
    }
    public function getCountManuProducts($manu_id)
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) FROM products WHERE manu_id = ?");
        $sql->bind_param("i", $manu_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);     
        return $items; //return an array
    }
  
   
  
    public function getCountProducts()
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) FROM products WHERE id");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);     
        return $items; //return an array
    }
    public function getProductByProductType($product_type_id){
        $sql = self::$connection->prepare("SELECT *
FROM products
WHERE product_type_id = $product_type_id;
");

        return parent::select($sql);
    }
    public function getAllProducts()
    {
      
       //SELECT * FROM products ORDER BY id DESC
        $sql = self::$connection->prepare('SELECT *, COUNT(products_user.user_id) AS pLike FROM `products` LEFT JOIN products_user ON products.id = products_user.product_id GROUP BY products.id;');
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllProductsNew()
    {
        $sql = self::$connection->prepare("SELECT *, COUNT(products_user.user_id) AS pLike FROM `products` LEFT JOIN products_user ON products.id = products_user.product_id GROUP BY products.id ORDER BY created_at DESC");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsById($id)
    {
        $sql = self::$connection->prepare("SELECT *, COUNT(products_user.user_id) AS pLike FROM `products` LEFT JOIN products_user ON products.id = products_user.product_id WHERE id = ? GROUP BY products.id ");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsByTypeId($type_id)
    {
        $sql = self::$connection->prepare("SELECT *, COUNT(products_user.user_id) AS pLike FROM `products` LEFT JOIN products_user ON products.id = products_user.product_id WHERE type_id = ? GROUP BY products.id ");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT *, COUNT(products_user.user_id) AS pLike FROM `products` LEFT JOIN products_user ON products.id = products_user.product_id WHERE `name` LIKE ? GROUP BY products.id  ");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        // var_dump($items);
        return $items; //return an array
       
    }
    public function searchWithProtype($keyword,$prototype)
    {
        $sql = self::$connection->prepare("SELECT *, COUNT(products_user.user_id) AS pLike FROM `products` LEFT JOIN products_user ON products.id = products_user.product_id WHERE `name` LIKE ? AND `type_id`=? GROUP BY products.id ");
        $keyword = "%$keyword%";
        $sql->bind_param("si", $keyword,$prototype);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        // var_dump($prototype);
        // var_dump($items);
        return $items; //return an array
       
    }

    public function getProductsLimit3()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY feature = 1 DESC LIMIT 3");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsLimit66()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY feature = 1 DESC LIMIT 6, 6");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsLimit6()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY feature = 1 DESC LIMIT 6");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsLimit12()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY feature = 1 DESC LIMIT 12");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }   
    public function getAllProductsSelling()
    {
        $sql = self::$connection->prepare("SELECT *, COUNT(products_user.user_id) AS pLike FROM `products` LEFT JOIN products_user ON products.id = products_user.product_id WHERE feature = 1 GROUP BY products.id");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getAllProductsByTypeIdSelling($type_id)
    {
        $sql = self::$connection->prepare("SELECT *, COUNT(products_user.user_id) AS pLike FROM `products` LEFT JOIN products_user ON products.id = products_user.product_id WHERE feature = 1 AND type_id = ? GROUP BY products.id ");
        $sql->bind_param("i", $type_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getProductsForPage($offset)
    {
       // SELECT *, COUNT(products_user.user_id) AS pLike FROM `products` LEFT JOIN products_user ON products.id = products_user.product_id GROUP BY products.id LIMIT ?,?;
     //  SELECT * FROM products ORDER BY id ASC LIMIT 6 OFFSET ?

        $sql = self::$connection->prepare('SELECT *, COUNT(products_user.user_id) AS pLike FROM `products` LEFT JOIN products_user ON products.id = products_user.product_id GROUP BY products.id LIMIT 6 OFFSET ?');
        $sql->bind_param("i", $offset);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function setView($id)
    {
       $sql = parent::$connection->prepare(" UPDATE `products` SET `product_view`=product_view+1 WHERE id =?");
        $sql->bind_param('i',$id);
        return  $sql->execute();   
    }


    public function likeProductUser($productId, $userId)
    {
        try {
            $sql = parent::$connection->prepare('INSERT INTO `products_user`(`product_id`, `user_id`) VALUES (?, ?)');
            $sql->bind_param('ii', $productId, $userId);
            return $sql->execute();
        } catch (mysqli_sql_exception $e) {
            // Xử lý ngoại lệ
            if ($e->getCode() == 1062) { // Mã lỗi 1062 là mã lỗi cho duplicate entry
                // Bạn có thể xử lý thông báo hoặc thực hiện các hành động khác ở đây.
                //echo "Bản ghi đã tồn tại!";
            } else {
                throw $e; // Ném lại ngoại lệ nếu không phải là lỗi duplicate entry.
            }
        }
    }


    public function getWishlist($userId)
    {
        $sql = parent::$connection->prepare(' SELECT * FROM `products` LEFT JOIN products_user ON products.id = products_user.product_id WHERE products_user.user_id = ?');
        $sql->bind_param('i', $userId);
        return parent::select($sql);
    }

    public function deleteWish($user_id, $product_id)
    {
        $sql = parent::$connection->prepare('DELETE FROM `products_user` WHERE user_id =? and product_id=?');
        $sql->bind_param('ii', $user_id, $product_id);
        return $sql->execute();
    }
    
    public function countwish($user_id)
    {
        $sql = parent::$connection->prepare(' SELECT COUNT(*) AS countWish FROM `products_user` WHERE user_id =?');
        $sql->bind_param('i', $user_id);
        return parent::select($sql)[0];
    }

    public function addCart($productId, $userId)
    {
        // Kiểm tra xem bản ghi đã tồn tại hay chưa
        if (!$this->isProductUserCartExists($productId, $userId)) {
            $sql = parent::$connection->prepare('INSERT INTO `product_user_cart`(`product_id`, `user_id`) VALUES (?, ?)');
            $sql->bind_param('ii', $productId, $userId);
            return $sql->execute();
        } else {
            // Xử lý khi bản ghi đã tồn tại
            // Ví dụ: Hiển thị thông báo hoặc thực hiện hành động khác

            return false;
        }
    }

    private function isProductUserCartExists($productId, $userId)
    {
        $sql = parent::$connection->prepare('SELECT 1 FROM `product_user_cart` WHERE `product_id` = ? AND `user_id` = ? LIMIT 1');
        $sql->bind_param('ii', $productId, $userId);
        $sql->execute();
        $sql->store_result();
        return $sql->num_rows > 0;
    }


    public function getCart($userId)
    {
        $sql = parent::$connection->prepare('SELECT * FROM `products` LEFT JOIN product_user_cart ON products.id = product_user_cart.product_id WHERE product_user_cart.user_id = ?');
        $sql->bind_param('i', $userId);
        return parent::select($sql);
    }
   
    public function deleteCart($user_id, $product_id)
    {
        $sql = parent::$connection->prepare('DELETE FROM `product_user_cart` WHERE user_id =? and product_id=?');
        $sql->bind_param('ii', $user_id, $product_id);
        return $sql->execute();
    }
    
    public function countCart($user_id)
    {
        $sql = parent::$connection->prepare(' SELECT COUNT(*) AS countCart FROM `product_user_cart` WHERE user_id =?');
        $sql->bind_param('i', $user_id);
        return parent::select($sql)[0];
    }
   
    public function setQuantityCart($dau,$user_id,$product_id)
    {
        $sql = parent::$connection->prepare('  UPDATE `product_user_cart` SET `quantity`= quantity + ? WHERE user_id =? and product_id=?');
        $sql->bind_param('iii',$dau, $user_id,$product_id);
        return $sql->execute();
    }
    public function getProductByIds($arrId)
    {

        // for ($i=0; $i < count($arrId) - 1; $i++) {
        //     $chamHoi .= '?,';
        // }
        $chamHoi = str_repeat('?,', count($arrId) - 1);
        $chamHoi .= '?';

        $i = str_repeat('i', count($arrId));

        // $chamHoi = substr($chamHoi, 0, -1);

        // for ($i=0; $i < count($arrId); $i++) {
        //     if($ == n)
        //     $chamHoi .= '?';
        //     else
        //     $chamHoi .= '?,';
        // }

        // $arrChamhoi = [];

        // for ($i=0; $i < count($arrId); $i++) {
        //     array_push($arrChamhoi, '?');
        // }
        // implode(',', $arrChamhoi);

        $sql = parent::$connection->prepare("SELECT * FROM products WHERE id IN ( $chamHoi ) ORDER BY FIELD(id, $chamHoi ) DESC");
        $sql->bind_param($i . $i, ...$arrId, ...$arrId);

        return parent::select($sql);
    }
   

}
?>

<!-- i: biến tương ứng có kiểu int-->
<!-- d: biến tương ứng có kiểu float-->
<!-- s: biến tương ứng có kiểu string-->
<!-- b: biến tương ứng là một đốm màu và sẽ được gửi trong các gói-->
<!-- INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `created_at`) VALUES (NULL, '1', '1', '1', '1', '1', '1', '1', '2022-11-30 20:59:51'); -->