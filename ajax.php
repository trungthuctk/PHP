<?php 
     include 'connect.php';
    session_start();
    $id =  $_POST['id']; 
    $sql = "SELECT * FROM `products` 
    WHERE `id` = $id"; 
    $result = $conn->query($sql);
    //var_dump($result);
    //if co data thi num_rows > 0, num_rows =0
    $data = [];
    if ($result->num_rows > 0) {
        //Gắn dữ liệu lấy được vào mảng $data
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    if(isset($_SESSION['cart']))
        $check=false;
        foreach($_SESSION['cart'] as $key => $value){
            if($value['id'] == $id){
                $_SESSION['cart'][$key]['quality']++;
                $check=true;
                break;
            }
        }
    if ($check==false){
        $product = [];
        foreach ($data as $value) {
            if( $id == $value['id']){
                $product['id']= $value['id'];
                $product['img']= $value['img'];
                $product['price']= $value['price'];
                $product['name']= $value['name'];
                $product['quality']= 1;
            }
        }
        $_SESSION['cart'][] = $product;
    }
    if(isset($_SESSION['cart'])){
        echo count($_SESSION['cart']);
    }
?>