<?php include 'app/views/shares/header.php'; ?>

<div class="row justify-content-center my-5">
    <div class="col-md-6">
        <div class="card shadow border-0 p-4">
            <h3 class="fw-bold text-uppercase text-center text-success mb-4">
                <i class="fa-solid fa-user-plus me-2"></i>Đăng Ký Tài Khoản
            </h3>
            
            <?php if (isset($errors['account'])): ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa-solid fa-circle-xmark me-2"></i><?php echo $errors['account']; ?>
                </div>
            <?php endif; ?>

            <form action="/BANQUANAO/account/save" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên đăng nhập (Username)</label>
                    <input type="text" name="username" class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : ''; ?>" 
                           value="<?php echo htmlspecialchars($username ?? ''); ?>" placeholder="Ví dụ: nva123">
                    <?php if (isset($errors['username'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['username']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Họ và tên (Fullname)</label>
                    <input type="text" name="fullname" class="form-control <?php echo isset($errors['fullname']) ? 'is-invalid' : ''; ?>" 
                           value="<?php echo htmlspecialchars($fullName ?? ''); ?>" placeholder="Ví dụ: Nguyễn Văn A">
                    <?php if (isset($errors['fullname'])): ?>
                        <div class="invalid-feedback"><?php echo $errors['fullname']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Mật khẩu</label>
                        <input type="password" name="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" 
                               placeholder="Nhập mật khẩu...">
                        <?php if (isset($errors['password'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['password']; ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Xác nhận mật khẩu</label>
                        <input type="password" name="confirmpassword" class="form-control <?php echo isset($errors['confirmPass']) ? 'is-invalid' : ''; ?>" 
                               placeholder="Nhập lại mật khẩu...">
                        <?php if (isset($errors['confirmPass'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['confirmPass']; ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Vai trò tài khoản (Role)</label>
                    <select name="role" class="form-select">
                        <option value="user" <?php echo (isset($role) && $role == 'user') ? 'selected' : ''; ?>>User (Khách hàng)</option>
                        <option value="admin" <?php echo (isset($role) && $role == 'admin') ? 'selected' : ''; ?>>Admin (Quản trị viên)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-success btn-lg w-100 fw-bold shadow-sm">
                        ĐĂNG KÝ NGAY
                    </button>
                </div>
                
                <div class="text-center mt-3">
                    <span class="text-muted">Đã có tài khoản?</span> 
                    <a href="/BANQUANAO/account/login" class="text-decoration-none fw-bold text-success ms-1">Đăng nhập ngay</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>