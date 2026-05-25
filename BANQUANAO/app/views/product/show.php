<?php include 'app/views/shares/header.php'; ?>

<div class="card p-4">
    <div class="row g-5">
        <div class="col-md-6">
            <div class="bg-light d-flex align-items-center justify-content-center border rounded shadow-sm" style="min-height: 450px;">
                <?php if(!empty($product->image)): ?>
                    <img src="<?php echo $product->image; ?>" class="img-fluid rounded w-100" style="max-height: 450px; object-fit: cover;">
                <?php else: ?>
                    <div class="text-center text-muted">
                        <i class="fa-solid fa-shirt fs-1 mb-3"></i>
                        <h4 class="text-uppercase tracking-wider">Trang Xinh Boutique Image</h4>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-6 d-flex flex-column justify-content-between py-2">
            <div>
                <span class="badge bg-dark mb-2 text-uppercase px-3 py-2">Thời trang cao cấp</span>
                <h1 class="fw-bold mb-3"><?php echo htmlspecialchars($product->name); ?></h1>
                
                <h2 class="text-danger fw-bold mb-4">
                    <?php echo number_format($product->price, 0, ',', '.'); ?> VNĐ
                </h2>
                
                <hr>
                
                <h5 class="fw-bold text-uppercase mt-4 mb-2"><i class="fa-solid fa-circle-info me-2 text-secondary"></i>Mô tả sản phẩm:</h5>
                <p class="text-muted lh-lg fs-6" style="white-space: pre-line;">
                    <?php echo htmlspecialchars($product->description); ?>
                </p>
            </div>

            <div class="mt-4">
                <div class="d-flex gap-3 mb-3">
                    <a href="/BANQUANAO/cart/add/<?php echo $product->id; ?>" class="btn btn-dark btn-lg flex-grow-1 text-uppercase fw-bold py-3 text-white text-decoration-none text-center">
                        <i class="fa-solid fa-basket-shopping me-2"></i>Thêm vào giỏ hàng
                    </a>
                    <button class="btn btn-outline-dark btn-lg px-4"><i class="fa-regular fa-heart"></i></button>
                </div>
                <a href="/BANQUANAO/Product" class="btn btn-link text-decoration-none text-muted p-0">
                    <i class="fa-solid fa-arrow-left me-1"></i> Quay lại trang chủ cửa hàng
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>