<?php include 'app/views/shares/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card p-4 shadow-sm border-0">
            <h3 class="fw-bold text-uppercase mb-4 text-success text-center">
                <i class="fa-solid fa-credit-card me-2"></i>Thông Tin Đặt Hàng & Thanh Toán
            </h3>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="/BANQUANAO/cart/processCheckout" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Họ tên người nhận hàng</label>
                    <input type="text" name="fullname" class="form-control" required placeholder="Nhập tên người nhận...">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Số điện thoại chính</label>
                        <input type="tel" name="phone" class="form-control" required placeholder="Nhập số điện thoại...">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Số ĐT dự phòng (Nếu có)</label>
                        <input type="tel" name="phone2" class="form-control" placeholder="Số điện thoại thứ 2...">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Địa chỉ nhận hàng chi tiết</label>
                    <textarea name="address" class="form-control" rows="2" required placeholder="Số nhà, tên đường, phường/xã..."></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Ghi chú đơn hàng (Notes)</label>
                    <textarea name="notes" class="form-control" rows="2" placeholder="Ví dụ: Giao giờ hành chính, gọi trước khi giao..."></textarea>
                </div>

                <h5 class="fw-bold text-secondary mb-3"><i class="fa-solid fa-wallet me-2"></i>Phương thức thanh toán</h5>
                <div class="card p-3 bg-light border mb-4">
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD" checked>
                        <label class="form-check-label fw-semibold text-dark" for="cod">
                            <i class="fa-solid fa-truck text-success me-2"></i>Thanh toán khi nhận hàng (COD)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="bank" value="BANK">
                        <label class="form-check-label fw-semibold text-dark" for="bank">
                            <i class="fa-solid fa-qrcode text-primary me-2"></i>Chuyển khoản Ngân hàng qua mã QR
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-lg w-100 fw-bold rounded-pill py-3 shadow-sm">
                    XÁC NHẬN ĐẶT HÀNG NGAY
                </button>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>