<?php
session_start();
// session_unset();
include("connection.php");
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $pass=$_POST['password'];
   $query= mysqli_query($con,"SELECT * FROM `register` WHERE email='$email' AND pass='$pass' AND role = 'user'");
   //$check=mysqli_num_rows($query);
   $row=mysqli_fetch_assoc($query);
   if($row>0){
    // print_r($row);
    $_SESSION['userid'] = $row['id']; 
    $_SESSION['username'] = $row['fname']; 
    $_SESSION['userLname'] = $row['lname']; 
    // print_r( $_SESSION['userid'] );
    // header("location:index.php");
            echo "<script>location.assign('index.php')</script>";    
}
   else{
    echo "<h3>login failed...!</h3>";
   }
}
if(isset($_POST["addToCart"])){
    if(isset($_SESSION['cart'])){
        // $count = count($_SESSION['cart']);
        // $_SESSION['cart'][$count]=array("proId"=>$_POST['pId'],'proName'=>$_POST['pName'],'proImage'=>$_POST['pImage'],"proQty"=>$_POST['pQty'],'proPrice'=>$_POST['pPrice']);
        // echo "<script>alert('cart added successfully')
        // location.assign('index.php')
        // </script>";
        $productId = array_column($_SESSION['cart'],"proId");
        if(in_array($_POST['pId'],$productId)){
            echo "<script>alert('product already exist')</script>";
        }else{
                $count = count($_SESSION['cart']);
        $_SESSION['cart'][$count]=array("proId"=>$_POST['pId'],'proName'=>$_POST['pName'],'proImage'=>$_POST['pImage'],"proQty"=>$_POST['pQty'],'proPrice'=>$_POST['pPrice']);
        echo "<script>alert('cart added successfully')
        location.assign('index.php')
        </script>";
        }
    }else{
        $_SESSION['cart'][0]=array("proId"=>$_POST['pId'],'proName'=>$_POST['pName'],'proImage'=>$_POST['pImage'],"proQty"=>$_POST['pQty'],'proPrice'=>$_POST['pPrice']);
echo "<script>alert('cart added successfully')
location.assign('index.php')
</script>";

    }
}
?>