<?php
    session_start();
    require_once('../../utils/utility.php');
    require_once('../../database/dbhelper.php');
    
    $user = getToken();
    if($user!=null) {
        header('Location:../');
        die();
    }
    $mess ='';
   
    $fullname = $email = '';
    if(!empty($_POST)){
    $email = getPOST('email');
    $password = getPOST('password');

    $sql = "select * from user where email = '$email' and password = '$password'";
    $userExist = executeResult($sql,true);
    if($userExist == null){
        $mess = "Sai email hoặc mật khẩu!";
    }
    else{
        $token = $userExist['email'].time();
        setcookie('token',$token,time()+1*24*60*60,'/');
        $UserId = $userExist['id'];
        $_SESSION['user'] = $userExist;
        $created_at = date('Y-m-d H:i:s');
        $sql = "insert into token (user_id,token,created_at) values('$UserId','$token','$created_at')";
        execute($sql);
        header('Location:../');
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>
<body>
    
    <form action="" class="form-login" method="post" style="height:450px">
        <h1 style="margin-bottom:10px;">Đăng nhập</h1> 
        <h6 class="text-danger" style="text-align:center;"><?=$mess?></h6>
        <div class="txtb">
            <input type="email" placeholder="Email" name="email" require="true">
        </div>
        <div class="txtb">
            <input type="password" placeholder="Password" name="password">
        </div>
        <input type="submit" class="logbtn" value="Đăng nhập" >
        
     </form>


    
</body>
</html>