<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Login 4 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
                <div class="col-12 col-md-6">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5 fw-bold">
                                    <h3>ĐĂNG NHẬP</h3>
                                </div>
                            </div>
                        </div>
                        <form action="./view/DangNhap/CheckLogin.php" method="post">
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-12">
                                    <label for="email" class="form-label fw-bold">Email
                                        <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="ten@gmail.com" required>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label fw-bold">Mật khẩu
                                        <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="mật khẩu" required>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-primary" type="submit">Đăng nhập</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">


                            <a href="#!" class="link-secondary text-decoration-none fw-bold">Quên mật khẩu</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>