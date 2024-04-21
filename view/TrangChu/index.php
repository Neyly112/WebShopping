<div>
<?php
    include "../model/pdo.php";
    include "../header.php";
?>
</div>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous">
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"></script>


<div>
    <?php
        if (isset($_GET['act'])) {
            $act = $_GET['act'];
            switch ($act) {
                case 'qlsp':
                    if (isset($_POST['tenSP'])) {
                        $tenSP = $_POST['tenSP'];
                        $giaBan = $_POST['giaBan'];
                        $sql = "INSERT INTO category(name) values('$tenloai')";
                        pdo_executer($sql);
                        $thongbao = "Thêm Thành Công";
                    }
                    include "../CapNhatSanPham/CapNhatSP.php";
                    break;
            }
        }
    ?>

</div>

<?php
    include "../Footer.php";
?>
