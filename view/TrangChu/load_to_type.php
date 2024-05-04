<div class="col-lg-3 mb-4">
    <div class="list-group">
        <h2>Các loại sản phẩm</h2>
        <?php
        include('./dbconnect.php');

        $sql = "SELECT * FROM loai";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <a href="index.php?act=listSp&MaLoai=<?php echo $row['MaLoai']; ?>" class="list-group-item list-group-item-action text-primary"><?php echo $row['TenLoai']; ?></a>
        <?php
            }
        } else {
        ?>
            <p>Không có loại sản phẩm nào.</p>
        <?php
        }
        ?>
    </div>
</div>
