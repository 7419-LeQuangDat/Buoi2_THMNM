<?php include 'app/views/shares/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-uppercase m-0"><i class="fa-solid fa-list me-2"></i>Quản lý danh mục</h2>
    <a href="/BANQUANAO/Category/add" class="btn btn-dark"><i class="fa-solid fa-plus me-1"></i> Thêm danh mục mới</a>
</div>

<div class="card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle m-0">
            <thead class="table-light">
                <tr>
                    <th width="80">ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th width="150" class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $category): ?>
                    <tr>
                        <td class="fw-bold">#<?php echo $category->id; ?></td>
                        <td class="fw-semibold text-primary"><?php echo htmlspecialchars($category->name); ?></td>
                        <td class="text-muted"><?php echo htmlspecialchars($category->description); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="/BANQUANAO/Category/edit/<?php echo $category->id; ?>" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen me-1"></i> Sửa</a>
                                <a href="/BANQUANAO/Category/delete/<?php echo $category->id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn chắc chắn muốn xóa danh mục này?')"><i class="fa-solid fa-trash me-1"></i> Xóa</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?><?php include 'app/views/shares/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-uppercase m-0"><i class="fa-solid fa-list me-2"></i>Quản lý danh mục</h2>
    <a href="/BANQUANAO/Category/add" class="btn btn-dark"><i class="fa-solid fa-plus me-1"></i> Thêm danh mục mới</a>
</div>

<div class="card p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle m-0">
            <thead class="table-light">
                <tr>
                    <th width="80">ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th width="150" class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $category): ?>
                    <tr>
                        <td class="fw-bold">#<?php echo $category->id; ?></td>
                        <td class="fw-semibold text-primary"><?php echo htmlspecialchars($category->name); ?></td>
                        <td class="text-muted"><?php echo htmlspecialchars($category->description); ?></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="/BANQUANAO/Category/edit/<?php echo $category->id; ?>" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-pen me-1"></i> Sửa</a>
                                <a href="/BANQUANAO/Category/delete/<?php echo $category->id; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn chắc chắn muốn xóa danh mục này?')"><i class="fa-solid fa-trash me-1"></i> Xóa</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>