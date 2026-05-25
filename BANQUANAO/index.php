<?php
// Tự động import Model cần thiết
require_once 'app/models/ProductModel.php';

// Lấy tham số url từ file .htaccess truyền về
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// 1. Kiểm tra phần đầu tiên của URL để xác định Controller
$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'Controller' : 'DefaultController';

// 2. Kiểm tra phần thứ hai của URL để xác định action
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

// 3. Kiểm tra phần thứ ba của URL (nếu có) để lấy tham số ID
$param = isset($url[2]) && $url[2] != '' ? $url[2] : null;

// Tự động require file Controller tương ứng dựa trên URL
$controllerFile = 'app/controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    
    // Khởi tạo Object của Controller đó
    $controllerObject = new $controllerName();

    // Kiểm tra xem hàm (action) có tồn tại trong Controller hay không
    if (method_exists($controllerObject, $action)) {
        if ($param !== null) {
            $controllerObject->$action($param);
        } else {
            $controllerObject->$action();
        }
    } else {
        header("HTTP/1.0 404 Not Found");
        echo "404 - Hành động '{$action}' không tồn tại trong '{$controllerName}'.";
    }
} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 - Bộ điều khiển '{$controllerName}' không tồn tại.";
}
?>