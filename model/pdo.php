<?php
// Mở kết nối CSDL bằng PDO
// 1.0 function connect database
function pdo_get_connect()
{
    $dburl = "mysql:host=localhost; dbname=qlbh; charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
//2.0 Thực thi cau lenh sql (INSERT, UPDATE, DELETE)
//$args mảng giá trị cung cấp cho các tham số của $sql
function pdo_executer($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
//3.0 thực thi câu lệnh truy vấn (SELECT)
//$args mảng giá trị cung cấp cho các tham số của $sql

function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    }
}
//Thực THI truy vấn 1 bảng ghi
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    }
}
?>