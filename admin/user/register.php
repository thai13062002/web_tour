<?php


$fullname =$email =$mess='';
    if(!empty($_POST)){
        $fullname = getPOST('fullname');
        $email = getPOST('email');
        $sdt=getPOST('sdt');
        $pw = getPOST('pw');
        $role = getPOST('role');

        if(empty($fullname)||empty($email)||empty($sdt)||empty($pw)||empty($role)){
            echo"<script>alert('Đăng ký không thành công')</script>";
        }
        else{
            $userExist = executeResult("select * from user where email = '$email'",true);
            if($userExist!=null){
                echo"<script>alert('Email đã tồn tại')</script>";
                
            }
            else{
                $sql = "insert into user(fullname,phone_number,email,password,role_id) values ('$fullname','$sdt','$email','$pw','$role')";
                execute($sql);
                echo"<script>alert('Đăng ký thành công')</script>";
                header('Location:index.php');
                die();
            }
        }
    }
?>