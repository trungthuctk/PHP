<?php 
    include 'connect.php';
    session_start();
    $id =  $_POST['id']; 

    if(isset($_SESSION['cart']) && isset($_POST['down']))
        foreach($_SESSION['cart'] as $key => $value){
            if($value['id'] == $id){
                $_SESSION['cart'][$key]['quality']--;
                
            }
        }
    if(isset($_SESSION['cart']) && isset($_POST['up']))
        foreach($_SESSION['cart'] as $key => $value){
            if($value['id'] == $id){
                $_SESSION['cart'][$key]['quality']++;
            
            }
        }
    if(isset($_SESSION['cart']) && isset($_POST['del']))
        foreach($_SESSION['cart'] as $key => $value){
            if($value['id'] == $id){
                unset($_SESSION['cart'][$key]);
            
            }
        }
    if(isset($_SESSION['cart'])){
        echo count($_SESSION['cart']);
    }
?>