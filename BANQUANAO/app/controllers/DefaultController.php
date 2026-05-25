<?php
class DefaultController
{
    public function index()
    {
        // Đổi đường dẫn chuyển hướng sang tên thư mục mới BANQUANAO
        header('Location: /BANQUANAO/Product');
        exit();
    }
}
?>