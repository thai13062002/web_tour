<?php
  session_start();
  require_once($Url.'../utils/utility.php');
  require_once($Url.'../database/dbhelper.php');
  $user = getToken();
  if($user== null){
    header('Location:'.$Url.'authen/login.php');
    die();
  }
  $rs = $user['id'];
  $sql = "select user.* from user where id = '$rs'";
  $data = executeResult($sql);
  
  
  
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css"
    />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title><?=$title?></title>
    
    <style>
      *{
          margin: 0;
          padding:0;
      }
      .row {
        width: 100vw;
      }
      
      .fas { 
        font-size: 20px;
        text-align:center;
      }
      .icon{
        margin-right:10px;
        
      }
      
      span {
        margin: auto;
      }
      .navbar-brand {
        margin: auto;
      }
      
      #logout {
        
        display:block;
        margin:auto;
        
      }
      
      #logout,.nav-item a:hover{
        color:white;
      }
      #nav-main h2 {
        text-align: center;
      }
      .dk {
        margin: 0 0 10px 0;
      }
      .jumbotron{
        padding:10px;
      }
      p{
        margin-bottom:5px;
      }.navbar{
        padding:0;
      }
    </style>
  </head>
<body>
  <div class="row" style="min-height:100vh;">
    <div class="col-md-2  bg-dark">
      <nav class="navbar navbar-expand-sm  navbar-dark">
        <a class="navbar-brand" href="<?=$Url?>index.php" >BlackWhite</a>
      </nav>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="<?=$Url?>"><i class="fas fa-home icon"></i>Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=$Url?>tour"><i class="fas fa-plane-departure icon"></i>Tour</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=$Url?>category"><i class="fas fa-list-alt icon"></i> Danh mục Tour</a>
            </li>
            <li class="nav-item" id ="user">
              <a class="nav-link " href="<?=$Url?>order"><i class="fas fa-calendar-check icon"></i>  Quản lý tour</a>
            </li>
            <li class="nav-item user">
              <a  class="nav-link" href="<?=$Url?>user"><i class="fas fa-user icon"></i> Quản lý người dùng</a>
            </li>
            <button class="nav-item text-nowrap btn btn-outline-primary btn-sm " id= "logout">
              <a class="nav-link" href="<?=$Url?>authen/logout.php"><i class="fas fa-sign-out-alt" style="margin-right:5px;"></i>Đăng xuất</a>
            </button>
          </ul>
        </div>
      </nav>
    </div>
    <div class="col-md-10 bg-light">
      <nav class="navbar navbar-expand-sm bg-light navbar-light right" style="position:relative;">
        <?php
          foreach ($data as $value) {
            echo '<span class="text-gray" style="position:absolute;right:0;top:10px;">Xin chào! '.$value['fullname'].'</span>';
          }
        ?>
      </nav>
  <main>