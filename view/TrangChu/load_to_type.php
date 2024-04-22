<div class="col-lg-3 mb-4">
    <div class="list-group">
        <h2>Các loại sản phẩm</h2>
        <?php
     
        include('./dbconnect.php');

        
        $sql = "SELECT TenLoai FROM loai";
        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
      
            while ($row = $result->fetch_assoc()) {
             
                echo '<a href="#" class="list-group-item list-group-item-action text-primary">' . $row['TenLoai'] . '</a>';
            }
        } else {
           
            echo "Không có loại sản phẩm nào.";
        }
        ?>
    </div>
</div>
