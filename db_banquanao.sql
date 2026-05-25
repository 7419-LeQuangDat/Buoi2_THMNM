-- 1. Tạo Database nếu chưa tồn tại và kích hoạt sử dụng
CREATE DATABASE IF NOT EXISTS `db_banquanao` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_banquanao`;

-- ========================================================
-- BƯỚC 1: XÓA CÁC BẢNG CŨ THEO ĐÚNG THỨ TỰ (ĐỂ TRÁNH LỖI KHÓA NGOẠI)
-- ========================================================
DROP TABLE IF EXISTS `order_details`;
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `product`;
DROP TABLE IF EXISTS `category`;
DROP TABLE IF EXISTS `account`;

-- ========================================================
-- BƯỚC 2: TẠO MỚI TOÀN BỘ CÁC BẢNG DỮ LIỆU ĐỒNG BỘ 100%
-- ========================================================

-- 1. Tạo bảng Danh mục sản phẩm (Category)
CREATE TABLE `category` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 2. Tạo bảng Sản phẩm (Product) có liên kết khóa ngoại tới danh mục
CREATE TABLE `product` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `price` DECIMAL(10,2) NOT NULL,
    `description` TEXT DEFAULT NULL,
    `image` VARCHAR(255) DEFAULT NULL,
    `category_id` INT NOT NULL,
    FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 3. Tạo bảng Tài khoản người dùng (Account) - ĐÃ SỬA: Thêm cột fullname để đồng bộ dữ liệu mẫu
CREATE TABLE `account` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL UNIQUE,
    `fullname` VARCHAR(255) NOT NULL,       -- Đã bổ sung cột này
    `password` VARCHAR(255) NOT NULL,
    `role` VARCHAR(50) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 4. Bảng Đơn hàng (Orders) - Có thuộc tính phone2 và notes theo đúng yêu cầu
CREATE TABLE `orders` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `fullname` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `phone2` VARCHAR(20) DEFAULT NULL,      -- Số điện thoại dự phòng
    `address` TEXT NOT NULL,
    `notes` TEXT DEFAULT NULL,              -- Ghi chú đơn hàng từ khách
    `total_price` DECIMAL(10,2) NOT NULL,
    `status` ENUM('Pending', 'Processing', 'Completed', 'Cancelled') DEFAULT 'Pending',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- 5. Bảng Chi tiết đơn hàng (Order Details) - Liên kết đơn hàng và sản phẩm
CREATE TABLE `order_details` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `order_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `quantity` INT NOT NULL,
    `price` DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- ========================================================
-- BƯỚC 3: THÊM DỮ LIỆU MẪU (SĂN SÀNG ĐỂ CHẠY THỬ NGHIỆM)
-- ========================================================

-- Thêm danh mục mẫu
INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Áo Nam', 'Các loại áo thời trang dành cho nam giới'),
(2, 'Quần Nữ', 'Các loại quần thời trang dành cho nữ giới');

-- Thêm sản phẩm mẫu (có đường link ảnh trực tuyến để giao diện hiển thị đẹp luôn)
INSERT INTO `product` (`id`, `name`, `price`, `description`, `image`, `category_id`) VALUES
(1, 'Áo Sơ Mi Trắng Form Rộng', 250000.00, 'Chất liệu vải lụa mềm mịn, thoáng mát, thích hợp đi học và đi làm.', 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=500', 1),
(2, 'Áo Thun Polo Basic', 190000.00, 'Chất cotton cá sấu co giãn 4 chiều, thấm hút mồ hôi cực kỳ tốt.', 'https://images.unsplash.com/photo-1581655353564-df123a1ec820?w=500', 1),
(3, 'Quần Jeans Nữ Ống Rộng', 320000.00, 'Vải jean dày dặn chuẩn xịn, không ra màu, tôn dáng hack chiều cao.', 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=500', 2);

-- Chèn tài khoản mẫu (Cả 2 tài khoản dưới đều dùng chung mật khẩu gốc mã hóa dạng Bcrypt là: 123456)
INSERT INTO `account` (`id`, `username`, `fullname`, `password`, `role`) VALUES
(1, 'admin', 'Quản Trị Viên', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
(2, 'user1', 'Nguyễn Văn Khách', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user');