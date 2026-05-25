<?php include 'app/views/shares/header.php'; ?>

<div class="row justify-content-center my-5">
    <div class="col-md-5">
        <div class="card shadow border-0 p-4">
            <h3 class="fw-bold text-uppercase text-center text-primary mb-4">
                <i class="fa-solid fa-right-to-bracket me-2"></i>Đăng Nhập Hệ Thống
            </h3>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i><?php echo $error; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="/BANQUANAO/account/checklogin" method="POST">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tên đăng nhập (Username)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-user text-muted"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="Nhập username của bạn..." required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Mật khẩu (Password)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="fa-solid fa-lock text-muted"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu..." required>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm">
                        ĐĂNG NHẬP
                    </button>
                </div>
                
                <div class="text-center mt-3">
                    <span class="text-muted">Chưa có tài khoản?</span> 
                    <a href="/BANQUANAO/account/register" class="text-decoration-none fw-bold text-primary ms-1">Đăng ký ngay</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>