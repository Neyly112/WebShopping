<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">
            <img src="./view/TrangChu/sliders/LOGO_NEW.png" alt="Bootstrap"height="45">
          </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?act=tc">TRANG CHỦ</a>
          </li>
          
         
          <li class="nav-item">
            <a class="nav-link" href="index.php?act=gttt">THÔNG TIN</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="index.php?act=gtyt">GIỎ HÀNG</a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              TÀI KHOẢN
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="index.php?act=gt">Đơn hàng của tôi</a></li>
              <li><a class="dropdown-item" href="index.php?act=dh">Đổi mật khẩu</a></li>
              <li><a class="dropdown-item" href="index.php?act=dx">Đăng xuất</a></li>
              <li><a class="dropdown-item" href="index.php?act=qldh">Quản lý đơn hàng</a></li>
              <li><a class="dropdown-item" href="index.php?act=qlsp">Quản lý sản phẩm</a></li>
              <li><a class="dropdown-item" href="index.php?act=dm">Quản lý danh mục</a></li>

            </ul>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="index.php?act=dangnhap">ĐĂNG NHẬP</a>
          </li>
        </ul>
        <form class="d-flex" action="index.php?act=search" method="POST">
          <input class="form-control me-2" type="search" placeholder="Search" name="nameSearch">
          <input class="btn bsb-btn-ml btn-success" type="submit" id="search" name="search" value="Tìm kiếm">
        </form>
      </div>
    </div>
  </nav>