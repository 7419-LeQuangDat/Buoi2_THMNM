<?php include 'app/views/shares/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h3 class="fw-bold text-uppercase mb-4 text-warning">
                <i class="fa-solid fa-pen-to-square me-2"></i>Chỉnh Sửa Sản Phẩm
            </h3>
            
            <form action="/BANQUANAO/Product/update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $product->id; ?>">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($product->name); ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Giá bán (VNĐ)</label>
                        <input type="number" name="price" class="form-control" value="<?php echo htmlspecialchars($product->price); ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Danh mục sản phẩm</label>
                    <select name="category_id" class="form-select">
                        <?php foreach($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>" <?php echo ($category->id == $product->category_id) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category->name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Thay đổi hình ảnh (Bỏ trống nếu giữ nguyên)</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <?php if(!empty($product->image)): ?>
                        <div class="mt-2">
                            <p class="mb-1 small text-muted">Ảnh hiện tại:</p>
                            <img src="<?php echo $product->image; ?>" style="height: 80px; object-fit: cover;" class="border rounded">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Mô tả sản phẩm</label>
                    <textarea name="description" class="form-control" rows="4" required><?php echo htmlspecialchars($product->description); ?></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-warning px-4 fw-bold">Cập nhật sản phẩm</button>
                    <a href="/BANQUANAO/Product" class="btn btn-outline-secondary px-4">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>