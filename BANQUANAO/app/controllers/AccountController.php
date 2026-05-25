<?php
require_once('app/config/database.php');
require_once('app/models/AccountModel.php');

class AccountController {
    private $accountModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }

    // Hiển thị trang đăng ký
    public function register() {
        include_once 'app/views/account/register.php';
    }

    // Hiển thị trang đăng nhập
    public function login() {
        include_once 'app/views/account/login.php';
    }

    // Xử lý lưu dữ liệu Đăng ký người dùng
    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullName = $_POST['fullname'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            $role = $_POST['role'] ?? 'user';

            $errors = [];
            if (empty($username)) $errors['username'] = "Vui lòng nhập username!";
            if (empty($fullName)) $errors['fullname'] = "Vui lòng nhập fullname!";
            if (empty($password)) $errors['password'] = "Vui lòng nhập password!";
            if ($password != $confirmPassword) $errors['confirmPass'] = "Mật khẩu và xác nhận chưa khớp!";
            
            if (!in_array($role, ['admin', 'user'])) $role = 'user';
            
            if ($this->accountModel->getAccountByUsername($username)) {
                $errors['account'] = "Tài khoản này đã được đăng ký!";
            }

            if (count($errors) > 0) {
                include_once 'app/views/account/register.php';
            } else {
                $result = $this->accountModel->save($username, $fullName, $password, $role);

                if ($result) {
                    // Chuyển hướng về trang đăng nhập của dự án BANQUANAO
                    header('Location: /BANQUANAO/account/login');
                    exit();
                }
            }
        }
    }

    // Xử lý logic Đăng xuất tài khoản
    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        // Chuyển hướng về trang danh sách sản phẩm sau khi đăng xuất
        header('Location: /BANQUANAO/product');
        exit();
    }

    // Xử lý kiểm tra logic Đăng nhập tài khoản
    public function checklogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $account = $this->accountModel->getAccountByUsername($username);
            if ($account && password_verify($password, $account->password)) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (!isset($_SESSION['username'])) {
                    $_SESSION['username'] = $account->username;
                    $_SESSION['role'] = $account->role;
                }
                // Đăng nhập thành công, điều hướng về trang quản lý sản phẩm
                header('Location: /BANQUANAO/product');
                exit();
            } else {
                $error = $account ? "Mật khẩu không đúng!" : "Không tìm thấy tài khoản!";
                include_once 'app/views/account/login.php';
                exit();
            }
        }
    }
}
?>