<?php
class OrderModel {
    private $conn;
    private $table_name = "orders";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Hàm lưu đơn hàng bao gồm phone2 và notes (Theo cấu trúc bài học nâng cấp)
    public function createOrder($username, $fullname, $phone, $phone2, $address, $notes, $total_price, $cart) {
        $query = "INSERT INTO " . $this->table_name . " (username, fullname, phone, phone2, address, notes, total_price, status) 
                  VALUES (:username, :fullname, :phone, :phone2, :address, :notes, :total_price, 'Pending')";
        
        $stmt = $this->conn->prepare($query);

        // Ràng buộc (Bind) các tham số dữ liệu bảo mật
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':phone2', $phone2);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':notes', $notes);
        $stmt->bindParam(':total_price', $total_price);

        if ($stmt->execute()) {
            // Lấy ID đơn hàng vừa tạo tự động
            $order_id = $this->conn->lastInsertId();

            // Chèn danh sách chi tiết các mặt hàng vào bảng order_details
            foreach ($cart as $product_id => $item) {
                $query_detail = "INSERT INTO order_details (order_id, product_id, quantity, price) 
                                 VALUES (:order_id, :product_id, :quantity, :price)";
                
                $stmt_detail = $this->conn->prepare($query_detail);
                $stmt_detail->bindParam(':order_id', $order_id);
                $stmt_detail->bindParam(':product_id', $product_id);
                $stmt_detail->bindParam(':quantity', $item['quantity']);
                $stmt_detail->bindParam(':price', $item['price']);
                $stmt_detail->execute();
            }

            return $order_id;
        }

        return false;
    }

    // Hàm lấy toàn bộ danh sách đơn hàng đã đặt của một tài khoản cụ thể
    public function getOrdersByUsername($username) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username ORDER BY id DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>