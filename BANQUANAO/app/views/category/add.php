<?php include 'app/views/shares/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="fw-bold text-uppercase mb-4 text-dark">Thêm Danh Mục Mới</h3>
            
            <form action="/BANQUANAO/Category/save" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên danh mục</label>
                    <input type="text" name="name" class="form-control <?php echo isset($errors['name']) ? 'is-invalid' : ''; ?>" placeholder="Ví dụ: Váy Công Sở">
                    <?php if(isset($errors['name'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['name']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Mô tả danh mục</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Mô tả ngắn gọn..."></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-dark px-4">Lưu danh mục</button>
                    <a href="/BANQUANAO/Category/list" class="btn btn-outline-secondary px-4">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>