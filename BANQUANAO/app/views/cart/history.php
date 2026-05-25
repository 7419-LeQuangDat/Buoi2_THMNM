<?php include 'app/views/shares/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-uppercase m-0"><i class="fa-solid fa-clock-rotate-left me-2 text-info"></i>Danh sách đơn hàng đã đặt</h2>
    <span class="badge bg-dark px-3 py-2 fs-6"><?php echo count($orders); ?> Đơn hàng</span>
</div>

<?php if (empty($orders)): ?>
    <div class="alert alert-warning text-center py-4 rounded-3 shadow-sm">
        Bạn chưa đặt mua đơn hàng nào trên hệ thống!
    </div>
<?php else: ?>
    <div class="table-responsive shadow-sm rounded-3 border">
        <table class="table table-hover align-middle bg-white m-0">
            <thead class="table-dark text-uppercase small">
                <tr>
                    <th style="width: 110px;" class="text-center">1. Mã đơn hàng</th>
                    <th>2. Tên khách</th>
                    <th>3. Số đt</th>
                    <th>4. Địa chỉ / Ghi chú</th>
                    <th>5. Tổng tiền</th>
                    <th>6. Ngày đặt hàng</th>
                    <th style="width: 120px;" class="text-center">Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td class="text-center fw-bold text-secondary">#DH<?php echo $order->id; ?></td>
                        
                        <td class="fw-bold text-dark"><?php echo htmlspecialchars($order->fullname); ?></td>
                        
                        <td>
                            <div class="fw-semibold text-primary"><?php echo htmlspecialchars($order->phone); ?></div>
                            <?php if(!empty($order->phone2)): ?>
                                <small class="text-muted d-block">Dự phòng: <?php echo htmlspecialchars($order->phone2); ?></small>
                            <?php endif; ?>
                        </td>
                        
                        <td>
                            <div class="small text-wrap" style="max-width: 250px;"><?php echo htmlspecialchars($order->address); ?></div>
                            <?php if(!empty($order->notes)): ?>
                                <small class="text-danger d-block mt-1"><i class="fa-regular fa-comment-dots me-1"></i>Lưu ý: <?php echo htmlspecialchars($order->notes); ?></small>
                            <?php endif; ?>
                        </td>
                        
                        <td class="text-danger fw-bold fs-6"><?php echo number_format($order->total_price, 0, ',', '.'); ?> đ</td>
                        
                        <td class="small text-muted fw-medium"><?php echo date('d/m/Y H:i', strtotime($order->created_at)); ?></td>
                        
                        <td class="text-center">
                            <?php if ($order->status == 'Pending'): ?>
                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill small">Chờ duyệt</span>
                            <?php else: ?>
                                <span class="badge bg-success px-3 py-2 rounded-pill small"><?php echo $order->status; ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>