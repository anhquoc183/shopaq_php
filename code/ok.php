<?php
    include("Connect.php");
    session_start();
    $profile['Email_User']='';
    $profile['Phone_User']='';
    $profile['Address_User']='';
    $profile['Name_User']='';
    $profile['ID_User']= 1;
    if(isset($_SESSION["Email_User"])){
        $Email_User = $_SESSION['Email_User'];
        $Statement_Users = "SELECT * FROM `users` WHERE Email_User= '$Email_User'";
        $Query_Users =mysqli_query($conn, $Statement_Users);
        $profile = mysqli_fetch_assoc($Query_Users);
    }
?>
<?php
$counts = 0;
if(isset($_SESSION['cart'])){
    $items = $_SESSION['cart'];
    $counts = count($items);
}
?>
<?php
if($counts!=0){
    foreach($_SESSION['cart'] as $key=>$value){
        $item[]=$key;
    }
    $str=implode(",",$item);
    $Statement_Product = "SELECT * FROM product WHERE ID_Product IN ($str)";
    $Query_Product = mysqli_query($conn, $Statement_Product);
    $total = 0;
    $ID_User= $profile['ID_User'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $Date_Order= date("H:i:s d/m/Y");
    $Address_User = $_POST['address'];
    $Phone_User = $_POST['numberphone'];
    $Name_User= $profile['Name_User'];
    $Email_User = $profile['Email_User'];
    $stt=0;
    $Statement_Order= "INSERT INTO `order`(ID_User, Address_User, Phone_User, Status_Order, Date_Order) VALUES ('$ID_User', '$Address_User', '$Phone_User', 'Chưa Giải Quyết', '$Date_Order')";
    $Query_Order = mysqli_query($conn, $Statement_Order);
    $last_id = mysqli_insert_id($conn);
    while ($Display_Product = mysqli_fetch_assoc($Query_Product)){
        $stt++;
        $ID_Product = $Display_Product['ID_Product'];
        $Quanlity_Order= $_SESSION['cart'][$Display_Product['ID_Product']];
        $Price_Order = ($_SESSION['cart'][$Display_Product['ID_Product']]*$Display_Product['Price_Product']*1000);
        $Statement_OrderDetail= "INSERT INTO orderdetail(ID_Order, ID_Product, Quanlity_Order, Price_Order) VALUES ('$last_id', '$ID_Product', '$Quanlity_Order', '$Price_Order')";
        $Query_OrderDetail = mysqli_query($conn, $Statement_OrderDetail);
    }
    unset($_SESSION['cart']); 
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mr.Quoc - Đặt Hàng Thành Công</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-6 text-center">
                <div class="alert alert-danger"> Đặt Hàng Thành Công</div>
            </div>
            <div class="col-12 text-center">
                <a href="home.php" class="btn btn-success">Xem Đơn Hàng</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php
echo '<script language="javascript">';
echo 'alert(" Đặt Hàng Thành Công")';
echo '</script>'; 
 header("Location: index.php");
// Nếu anh mở dòng trên ra thì khi đặt hàng thành công nó tự quay trở lại trang chủ đó
// Oke anh nhé
// Em đã cố gắng
?>