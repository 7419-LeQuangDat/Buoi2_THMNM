<?php include 'app/views/shares/header.php'; ?>

<h2 class="fw-bold text-uppercase mb-4"><i class="fa-solid fa-cart-shopping me-2 text-primary"></i>Giỏ Hàng Của Bạn</h2>

<?php if (empty($cart)): ?>
    <div class="alert alert-info py-4 text-center">
        <i class="fa-solid fa-basket-shopping fs-1 d-block mb-3 text-muted"></i>
        <p class="mb-3 fs-5">Giỏ hàng của bạn đang trống rỗng!</p>
        <a href="/BANQUANAO/Product" class="btn btn-primary fw-bold rounded-pill px-4">QUAY LẠI MUA SẮM</a>
    </div>
<?php else: ?>
    <form action="/BANQUANAO/cart/update" method="POST">
        <div class="table-responsive shadow-sm rounded mb-4">
            <table class="table table-bordered align-middle bg-white m-0">
                <thead class="table-dark text-uppercase">
                    <tr>
                        <th style="width: 100px;">Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá bán</th>
                        <th style="width: 120px;">Số lượng</th>
                        <th>Thành tiền</th>
                        <th style="width: 80px;" class="text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach ($cart as $id => $item): 
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td class="text-center">
                                <?php if (!empty($item['image'])): ?>
                                    <img src="<?php echo $item['image']; ?>" style="height: 60px; object-fit: cover;" class="rounded border">
                                <?php else: ?>
                                    <i class="fa-solid fa-shirt fs-3 text-muted"></i>
                                <?php endif; ?>
                            </td>
                            <td class="fw-bold text-dark"><?php echo htmlspecialchars($item['name']); ?></td>
                            <td class="text-danger fw-semibold"><?php echo number_format($item['price'], 0, ',', '.'); ?> đ</td>
                            <td>
                                <input type="number" name="quantities[<?php echo $id; ?>]" value="<?php echo $item['quantity']; ?>" class="form-control text-center" min="1">
                            </td>
                            <td class="text-danger fw-bold"><?php echo number_format($subtotal, 0, ',', '.'); ?> đ</td>
                            <td class="text-center">
                                <a href="/BANQUANAO/cart/delete/<?php echo $id; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Xóa khỏi giỏ?')">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center bg-light p-4 rounded shadow-sm">
            <div>
                <button type="submit" class="btn btn-outline-secondary fw-semibold rounded-pill px-4">
                    <i class="fa-solid fa-arrows-rotate me-2"></i>Cập nhật số lượng
                </button>
            </div>
            <div class="text-end">
                <h4 class="mb-3">Tổng cộng: <span class="text-danger fw-bold fs-2"><?php echo number_format($total, 0, ',', '.'); ?> đ</span></h4>
                <a href="/BANQUANAO/cart/checkout" class="btn btn-success btn-lg fw-bold rounded-pill px-5 shadow-sm">
                    TIẾN HÀNH ĐẶT HÀNG <i class="fa-solid fa-circle-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </form>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>