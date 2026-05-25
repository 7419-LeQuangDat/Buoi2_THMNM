<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Xinh Boutique - Cửa hàng quần áo thời trang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body { font-family: 'Montserrat', sans-serif; background-color: #fcfcfc; color: #222; }
        .navbar { box-shadow: 0 2px 10px rgba(0,0,0,0.05); letter-spacing: 1px; }
        .navbar-brand { font-weight: 700; font-size: 1.5rem; }
        .nav-link { font-weight: 500; transition: color 0.3s; }
        .nav-link:hover { color: #ff4757 !important; }
        .card { border: none; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: transform 0.3s; }
        .card:hover { transform: translateY(-5px); }
        .dropdown-item:hover { background-color: #f8f9fa; color: #ff4757 !important; }
    </style>
</head>
<body>
<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-3">
        <div class="container">
            <a class="navbar-brand text-uppercase" href="/BANQUANAO/Product">
                <i class="fa-solid fa-bag-shopping me-2 text-warning"></i>Trang Xinh Boutique
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link text-white mx-2" href="/BANQUANAO/Product">Sản Phẩm</a></li>
                    <li class="nav-item"><a class="nav-link text-white-50 mx-2" href="/BANQUANAO/Category/list">Danh Mục</a></li>
                </ul>
                
                <div class="d-flex align-items-center gap-2">
                    <a href="/BANQUANAO/cart" class="btn btn-outline-warning position-relative px-3 me-1 rounded-pill shadow-sm">
                        <i class="fa-solid fa-cart-shopping me-1"></i> Giỏ Hàng
                        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo count($_SESSION['cart']); ?>
                            </span>
                        <?php endif; ?>
                    </a>

                    <a href="/BANQUANAO/Product/add" class="btn btn-warning px-3 fw-semibold rounded-pill shadow-sm me-2">
                        <i class="fa-solid fa-circle-plus me-1"></i>Thêm Mới
                    </a>

                    <?php if (isset($_SESSION['username'])): ?>
                        <div class="dropdown">
                            <button class="btn btn-outline-light dropdown-toggle fw-semibold rounded-pill" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user-circle text-warning me-1"></i>
                                <?php echo htmlspecialchars($_SESSION['username']); ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2" aria-labelledby="userMenu">
                                <li>
                                    <a class="dropdown-item fw-semibold" href="/BANQUANAO/cart/history">
                                        <i class="fa-solid fa-clock-rotate-left me-2 text-muted"></i>Đơn hàng đã đặt
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger fw-semibold" href="/BANQUANAO/account/logout">
                                        <i class="fa-solid fa-right-from-bracket me-2"></i>Đăng xuất
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a href="/BANQUANAO/account/login" class="btn btn-outline-primary px-3 fw-semibold rounded-pill text-white border-white">Đăng nhập</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container my-5">