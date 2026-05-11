<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../topbar.php'; ?>

<?php
  $sqlShowContact = "SELECT * FROM contact";
  $contacts = $conn->query($sqlShowContact);
?>

<div class="main-content-inner" id="main-content">
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="header-title mb-3">Quản lý liên hệ</h4>

            <?php if (isset($_SESSION['thongBao'])): ?>
                <div class="alert alert-success">
                    <?php 
                    echo $_SESSION['thongBao']; 
                    unset($_SESSION['thongBao']);
                    ?>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center" style="min-width: 900px;">
                    <thead class="table-light">
                        <tr>
                            <th>STT</th>
                            <th>Người gửi</th>
                            <th>Email</th>
                            <th style="text-align: left;">Tin nhắn</th>
                            <th>Ngày gửi</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($contacts->num_rows > 0) {
                            $count = 1;
                            while ($row = $contacts->fetch_assoc()) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $count; ?></th>
                            <td><?php echo htmlspecialchars($row["username"]); ?></td>
                            <td><?php echo htmlspecialchars($row["email"]); ?></td>
                            <td style="text-align: left;"><?php echo htmlspecialchars($row["message"]); ?></td>
                            <td><?php echo date('H:i - d/m/Y', strtotime($row["created_at"])); ?></td>
                            <td>
                                <?php if ($row["status"] == 0): ?>
                                    <span style="color: #f39c12; font-weight: 600;">Chưa phản hồi</span>
                                <?php else: ?>
                                    <span style="color: #27ae60; font-weight: 600;">Đã phản hồi</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($row["status"] == 0): ?>
                                    <a href="action.php?action=mark_replied&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success m-1" title="Đánh dấu đã phản hồi">
                                        <i class="fa-solid fa-check"></i>
                                    </a>
                                <?php endif; ?>
                                <a href="action.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger m-1" onclick="return confirm('Bạn có chắc chắn muốn xóa liên hệ này?')" title="Xóa">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                                $count++;
                            }
                        } else {
                            echo "<tr><td colspan='7' style='text-align: center; padding: 20px;'>Chưa có liên hệ nào!</td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>