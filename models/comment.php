<?php
class Comment extends Model
{
    private $productId;

    // ... (các phương thức khác)

    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    public function getProductId()
    {
        return $this->productId;
    }
    public function getAllCommentById($id_products)
    {
        $sql = self::$connection->prepare("SELECT comment.*
        FROM comment
        JOIN products ON comment.id = products.id
        WHERE products.id = $id_products");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getRatingCount($id){
        $sql= self::$connection->prepare("SELECT $, assess, COUNT(*) AS comment_count
FROM comment
GROUP BY id, assess;id
");
        $sql->execute();
        $items=array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getAverageRatingPerld($id){
        $sql = self::$connection->prepare("SELECT id, CONCAT(ROUND(AVG(assess), 1)) AS average_rating
FROM comment
WHERE id = $id
GROUP BY id;");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getCommentCountsByRating($id){
        $sql = self::$connection->prepare("SELECT assess, COUNT(*) AS comment_count FROM comment WHERE id =$id GROUP BY assess");
        $sql->execute();
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function addComment($username, $email, $review,$assess)
    {
        try {
            $productId = $this->getProductId();
            $productId = isset($_GET['id']) ? $_GET['id'] : null;
            $sql = self::$connection->prepare("INSERT INTO `comment` (`id_comment`, `username`, `email`, `review`, `assess`, `time`, `id`) VALUES (null, ?, ?, ?, ?, NOW(), ?)");
            $sql->bind_param("sssis", $username, $email, $review, $assess,$productId);
            $sql->execute();
            
            $items = array();
            
            $this->updateCommentCount($productId);
            // echo "Error: " . $sql->errno . " - " . $sql->error;
            return $items;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
        // // Thực hiện câu lệnh SQL thêm comment
        // if ($sql->execute()) {
        //     // Nếu thêm comment thành công, cập nhật số lượng comment_count
        //     $sqlUpdateCommentCount = "UPDATE comment_count SET comment_count = comment_count + 1";
        //     if (self::$connection->query($sqlUpdateCommentCount)) {
        //         return true;
        //     } else {
        //         return false; // Xử lý lỗi khi cập nhật comment_count
        //     }
        // } else {
        //     return false; // Xử lý lỗi khi thêm comment
        // }
    }
    private function updateCommentCount($productId)
    {
        $sqlUpdateCommentCount = self::$connection->prepare("UPDATE comment_count SET comment_count = comment_count + 1 WHERE id = ?");
        $sqlUpdateCommentCount->bind_param("i", $productId);
        $sqlUpdateCommentCount->execute();
    }


    public function getCommentCount($productId)
    {
        $sql = self::$connection->prepare("SELECT comment_count.*
            FROM comment_count
            JOIN products ON comment_count.id = products.id
            WHERE products.id = ?");
        $sql->bind_param("i", $productId);
        $sql->execute();
        $result = $sql->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    
}
