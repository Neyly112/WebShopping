ver 1.0

Vì đây là trang web phục dụ cho các cửa hàng nhỏ lẻ chỉ cần một người vận hành trang web nên nhóm em thực hiện làm trang web chỉ một tài khoản admin và trong trang web không có chức năng thêm admin 

**** HƯỚNG DẪN SỬ DỤNG ***** 

Tài khoản admin :
tên đăng nhập :embemay772023@gmail.com
mật khẩu : 123

Cách 1 : Chạy bằng source code  :

Người dùng cần tải xampp để thực hiện chạy code bằng source code :
+Thực hiện cài đặt xampp 
+Nhấn start Apache, và My SQL
+File source code phải nằm trong thư mục htdocs của thư mục cài đặt xampp (mặc dịnh là C:\xampp\htdocs)
+Quay lại ứng dụng xampp, trên hàng Mysql nhấn chọn admin , trang web hiện ra 
+ trên thanh công cụ nhấn chọn nhập , và chọn  đường dẫn đến  file qlbh.sql trong source code , và nhấn nút nhập 
+Quay lại ứng dụng xampp, trên hàng Apache nhấn chọn admin , trang web hiện ra và chọn WED
+Hiện lên là trang chủ của web 

Cách 2 : chạy bằng host :
+ https://wbh20041.000webhostapp.com/

**** SOURCE CODE ***** 
-index.php là file điều hương của trang web
-qlbh.sql là file chứa code để chạy cơ sở dữ liệu
-dbconnect.php là file kêt nối với csdl
*Mục view : là mục giao diện hệ thống dành cho user, trong view các chức năng dều được phân chia theo từng mục tương ứng
*Mục admin là giao diện hệ thống dành cho admin , trong admin sẽ có một file index.php dành riêng cho admin 
*Mục crud là mục thực hiện các chức năng thêm sửa xóa giỏ hàng (lý do khách quan mà không nằm trong mục view vì lúc đầu phân chia 2 bạn làm nhưng bạn bạn lại có ý tưởng đặt case thư mục khác nhau nên mới nằm riêng như vậy)
*Mục products chứa hình ảnh để test thêm sản phẩm , khi thêm thì hình sẽ tự động thêm vào thư mục view/Uploads
*Mục model :dùng để tạo các câu lệnh truy vấn sql


Thanks for reading ,