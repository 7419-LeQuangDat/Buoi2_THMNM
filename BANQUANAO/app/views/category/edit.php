<?php include 'app/views/shares/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="fw-bold text-uppercase mb-4 text-dark">Sửa Danh Mục</h3>
            
            <form action="/BANQUANAO/Category/update" method="POST">
                <input type="hidden" name="id" value="<?php echo $category->id; ?>">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên danh mục</label>
                    <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($category->name); ?>" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Mô tả danh mục</label>
                    <textarea name="description" class="form-control" rows="3" required><?php echo htmlspecialchars($category->description); ?></textarea>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">Cập nhật</button>
                    <a href="/BANQUANAO/Category/list" class="btn btn-outline-secondary px-4">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>