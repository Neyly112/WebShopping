<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách yêu thích</title>

    <!-- Liên kết CSS Bootstrap bằng CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<script src="xoa.js"></script>
<body>

    <!-- Main content -->
    <div class="container">
        <h1 style="text-align: center;">DANH SÁCH YÊU THÍCH</h1>


        <?php
        $imageDirectory = "../../products/"; // Thay đổi đường dẫn tới thư mục chứa hình ảnh của sản phẩm
        include('./dbconnect.php');

        // 2. Chuẩn bị câu truy vấn $sql
        $sql = "select SP.TenSanPham,SP.MaSanPham, SP.HinhAnh,SP.GiaBan from `DsYeuThich` DSYT,`SanPham` SP where DSYT.MaSanPham=SP.MaSanPham";

        // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
        $result = mysqli_query($conn, $sql);

        $data = [];
        $rowNum = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $data[] = array(
                'rowNum' => $rowNum, 
                'MaSanPham' => $row['MaSanPham'],
                'HinhAnh' => $row['HinhAnh'],
                'TenSanPham' => $row['TenSanPham'],
                'GiaBan' => $row['GiaBan']
                
            );
            $rowNum++;
        }
        ?>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <td>STT</td>
                    <td>Hình ảnh</td>
                    <td>Tên sản phẩm</td>
                    <td>Gía bán</td>
                    <td>Mã sản phẩm</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $row) :
                        // Kết hợp đường dẫn đến thư mục chứa hình ảnh với tên tệp của hình ảnh
                        $imagePath = $imageDirectory . $row['HinhAnh'];
                    ?>
                    <tr>
                        <td><?php echo $row['rowNum']; ?></td>
                     
                        <td><img src="<?php echo $imagePath; ?>" alt="Product Image" style="max-width: 500px;"></td>
                        <td><?php echo $row['TenSanPham']; ?></td>
                        <td><?php echo $row['GiaBan']; ?></td>
                        <td><?php echo $row['MaSanPham']; ?></td>
                        
                            <!-- Button Xóa -->
                        <td>
                            <button class="btn btn-danger btnDelete"id="delete" data-masanpham="<?php echo $row['MaSanPham']; ?>">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Liên kết JS Jquery bằng CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <!-- Liên kết JS Popper bằng CDN -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Liên kết JS Bootstrap bằng CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Liên kết JS FontAwesome bằng CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>
