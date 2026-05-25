<?php include 'app/views/shares/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h3 class="fw-bold text-uppercase mb-4 text-success">
                <i class="fa-solid fa-square-plus me-2"></i>Thêm Sản Phẩm Mới
            </h3>
            
            <form action="/BANQUANAO/Product/save" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Tên sản phẩm</label>
                        <input type="text" name="name" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" placeholder="Ví dụ: Áo Sơ Mi Form Rộng">
                        <?php if(isset($errors['name'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['name']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Giá bán (VNĐ)</label>
                        <input type="number" name="price" class="form-control <?php echo isset($errors['price']) ? 'is-invalid' : ''; ?>" placeholder="Ví dụ: 350000">
                        <?php if(isset($errors['price'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['price']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Danh mục sản phẩm</label>
                    <select name="category_id" class="form-select">
                        <?php foreach($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Hình ảnh sản phẩm</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Mô tả sản phẩm</label>
                    <textarea name="description" class="form-control <?php echo isset($errors['description']) ? 'is-invalid' : ''; ?>" rows="4" placeholder="Nhập chất liệu, thông số size..."></textarea>
                    <?php if(isset($errors['description'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['description']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success px-4 fw-bold">Đăng bán sản phẩm</button>
                    <a href="/BANQUANAO/Product" class="btn btn-outline-secondary px-4">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>