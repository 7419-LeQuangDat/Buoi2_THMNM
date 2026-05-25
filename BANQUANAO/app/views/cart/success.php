<?php include 'app/views/shares/header.php'; ?>

<div class="row justify-content-center my-5">
    <div class="col-md-6 text-center">
        <div class="card p-5 shadow-sm border-0 rounded-4">
            <div class="mb-4">
                <i class="fa-solid fa-circle-check text-success display-1"></i>
            </div>
            <h2 class="fw-bold text-success text-uppercase mb-2">Đặt Hàng Thành Công!</h2>
            <p class="text-muted fs-6 mb-4">Cảm ơn bạn đã mua sắm tại Cửa hàng. Đơn hàng của bạn đã được ghi nhận trên hệ thống.</p>
            
            <div class="alert alert-secondary text-start p-3 rounded-3 mb-4">
                <p class="mb-1 small"><strong>Mã đơn hàng:</strong> #DH<?php echo htmlspecialchars($_GET['order_id'] ?? 'N/A'); ?></p>
                <p class="mb-0 small text-muted">Trạng thái: Đang chờ duyệt (Pending)</p>
            </div>

            <div class="d-flex flex-column gap-2">
                <a href="/BANQUANAO/cart/history" class="btn btn-primary btn-lg fw-bold rounded-pill shadow-sm">
                    <i class="fa-solid fa-clock-rotate-left me-2"></i>Xem danh sách đơn hàng đã đặt
                </a>
                <a href="/BANQUANAO/Product" class="btn btn-link text-decoration-none text-muted">Quay lại mua sắm</a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>