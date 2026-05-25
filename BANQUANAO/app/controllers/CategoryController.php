<?php
require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController {
    private $categoryModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    public function list() {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    public function add() {
        include 'app/views/category/add.php';
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            $result = $this->categoryModel->addCategory($name, $description);

            if (is_array($result)) {
                $errors = $result;
                include 'app/views/category/add.php';
            } else {
                // Đổi đường dẫn điều hướng sau khi lưu thành công
                header('Location: /BANQUANAO/Category/list');
            }
        }
    }

    public function edit($id) {
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/category/edit.php';
        } else {
            echo "Không tìm thấy danh mục.";
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            if ($this->categoryModel->updateCategory($id, $name, $description)) {
                // Đổi đường dẫn điều hướng sau khi cập nhật thành công
                header('Location: /BANQUANAO/Category/list');
            } else {
                echo "Có lỗi xảy ra khi cập nhật.";
            }
        }
    }

    public function delete($id) {
        if ($this->categoryModel->deleteCategory($id)) {
            // Đổi đường dẫn điều hướng sau khi xóa thành công
            header('Location: /BANQUANAO/Category/list');
        } else {
            echo "Có lỗi xảy ra khi xóa.";
        }
    }
}
?>