<?php include 'app/views/shares/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-uppercase m-0"><i class="fa-solid fa-shirt me-2"></i>Sản phẩm hiện có</h2>
    <span class="badge bg-dark px-3 py-2 fs-6"><?php echo count($products); ?> Items</span>
</div>

<div class="row g-4">
    <?php foreach($products as $product): ?>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="bg-light d-flex align-items-center justify-content-center text-secondary position-relative" style="height: 260px;">
                    <?php if(!empty($product->image)): ?>
                        <img src="<?php echo $product->image; ?>" class="card-img-top h-100 w-100" style="object-fit: cover;">
                    <?php else: ?>
                        <div class="text-center">
                            <i class="fa-solid fa-image fs-1 mb-2 text-muted"></i>
                            <p class="m-0 small text-uppercase tracking-wider text-muted">Trang Xinh Boutique</p>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="card-body d-flex flex-column p-4">
                    <h5 class="card-title fw-bold text-truncate mb-1">
                        <a href="/BANQUANAO/Product/show/<?php echo $product->id; ?>" class="text-decoration-none text-dark">
                            <?php echo htmlspecialchars($product->name); ?>
                        </a>
                    </h5>
                    <p class="text-muted small flex-grow-1 text-truncate"><?php echo htmlspecialchars($product->description); ?></p>
                    <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top gap-1">
                        <span class="text-danger fw-bold fs-5"><?php echo number_format($product->price, 0, ',', '.'); ?> đ</span>
                        
                        <div class="d-flex gap-1">
                            <a href="/BANQUANAO/cart/add/<?php echo $product->id; ?>" class="btn btn-sm btn-primary fw-semibold" title="Thêm vào giỏ hàng">
                                <i class="fa-solid fa-cart-plus"></i> Mua
                            </a>
                            <a href="/BANQUANAO/Product/edit/<?php echo $product->id; ?>" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen"></i></a>
                            <a href="/BANQUANAO/Product/delete/<?php echo $product->id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Xóa sản phẩm này?')"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>