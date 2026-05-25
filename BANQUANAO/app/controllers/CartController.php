<?php
require_once 'app/config/database.php';
require_once 'app/models/ProductModel.php';
require_once 'app/models/OrderModel.php';

class CartController {
    private $productModel;
    private $orderModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
        $this->orderModel = new OrderModel($this->db);
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // 1. Giao diện trang xem Giỏ hàng
    public function index() {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        include_once 'app/views/cart/index.php';
    }

    // 2. Hành động Thêm sản phẩm vào giỏ hàng
    public function add($id) {
        $product = $this->productModel->getProductById($id); 
        
        if (!$product) {
            header('Location: /BANQUANAO/Product');
            exit();
        }

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }

        header('Location: /BANQUANAO/cart');
        exit();
    }

    // 3. Hành động Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantities'])) {
            foreach ($_POST['quantities'] as $id => $quantity) {
                if ($quantity <= 0) {
                    unset($_SESSION['cart'][$id]); 
                } else {
                    $_SESSION['cart'][$id]['quantity'] = intval($quantity);
                }
            }
        }
        header('Location: /BANQUANAO/cart');
        exit();
    }

    // 4. Hành động Xóa sản phẩm ra khỏi giỏ
    public function delete($id) {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        header('Location: /BANQUANAO/cart');
        exit();
    }

    // 5. Giao diện trang điền thông tin Đặt hàng
    public function checkout() {
        if (!isset($_SESSION['username'])) {
            header('Location: /BANQUANAO/account/login');
            exit();
        }

        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        if (empty($cart)) {
            header('Location: /BANQUANAO/cart');
            exit();
        }

        include_once 'app/views/cart/checkout.php';
    }

    // 6. Xử lý nhận dữ liệu Đặt hàng (Lưu Ghi chú, Phone2 và Phương thức thanh toán)
    public function processCheckout() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $phone2 = $_POST['phone2'] ?? ''; // Lấy phone2 mới
            $address = $_POST['address'] ?? '';
            $notes = $_POST['notes'] ?? ''; // Lấy notes mới

            // Tính tổng giá trị đơn hàng
            $total_price = 0;
            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
            foreach ($cart as $item) {
                $total_price += $item['price'] * $item['quantity'];
            }

            $username = $_SESSION['username'];

            // Gọi model lưu vào Database
            $order_id = $this->orderModel->createOrder(
                $username, $fullname, $phone, $phone2, $address, $notes, $total_price, $cart
            );

            if ($order_id) {
                // Xóa giỏ hàng khi thành công
                unset($_SESSION['cart']);
                // Chuyển hướng sang trang báo thành công
                header('Location: /BANQUANAO/cart/success?order_id=' . $order_id);
                exit();
            } else {
                $error = "Không thể lưu đơn hàng. Vui lòng thử lại!";
                include_once 'app/views/cart/checkout.php';
            }
        }
    }

    // 7. Giao diện trang Đặt hàng thành công (Báo mã đơn kèm phương thức thanh toán)
    public function success() {
        include_once 'app/views/cart/success.php';
    }

    // 8. Chức năng hiển thị DANH SÁCH ĐƠN HÀNG ĐÃ ĐẶT của người dùng
    public function history() {
        if (!isset($_SESSION['username'])) {
            header('Location: /BANQUANAO/account/login');
            exit();
        }

        $username = $_SESSION['username'];
        $orders = $this->orderModel->getOrdersByUsername($username);

        include_once 'app/views/cart/history.php';
    }
}
?>