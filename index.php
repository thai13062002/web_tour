<?php
    $title = 'Trang chủ';
    require_once('layout/header.php');
    $sql = "select * from category ";
    $data =  executeResult($sql);
    $sql1= "select * from tour order by id DESC limit 6";
    $data1 = executeResult($sql1);
?>


<div id="demo" class="carousel slide" data-ride="carousel" style="margin-top:85px;">

<!-- Indicators -->
<ul class="carousel-indicators" style="bottom:40px;">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
  <li data-target="#demo" data-slide-to="3"></li>
 
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="upload/bien1.jpg" alt="Los Angeles">
  </div>
  <div class="carousel-item">
    <img src="upload/bien2.jpg" alt="Chicago">
  </div>
  <div class="carousel-item">
    <img src="upload/anh3.jpg" alt="New York">
  </div>
  <div class="carousel-item">
    <img src="upload/anh4.jpg" alt="New York">
  </div>
  
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
<div style="margin:auto;position:relative;top:-150px;width:30%;">
  <form method ="post" action = "search.php" class="form-inline">
    <input type="text" name = "search"style="padding:5px 15px;"class="form-control" id ="search" placeholder="Tìm kiếm địa điểm?"></input>
    <button id="btn_search" class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
  </form>
  
  </div>
</div>
      <h2 style="text-align:center; margin-bottom:20px;">Các tour du lịch mới nhất</h2>
      <div class="container">
        <div class="row">
          <?php
            foreach($data1 as $value){
              echo'
              
                <div class="col-md-4 col-sm-6 " style="margin-bottom:20px;">
                  <div class="card" style="margin: 0 auto;">
                  <img src="'.path($value['thumbnail'],'./').'" style="height:192px;"></img>
                  <p style="padding:0 15px;margin-top:20px;">'.$value['title'].'</p>
                  <p style="padding:0 15px;color:red"><span style="color:black;">Giá:</span> '.number_format($value['discount']).'đ</p>
                  <div class="bt">
                    <a href="order.php?id='.$value['id'].'"><button class="btn btn-danger w-100"  data-toggle="modal" data-target="#myModal"" style="margin-bottom:5px;"><i class="far fa-shopping-cart" style="margin-right:15px;"></i>Đặt ngay</button></a>
                    <a href="detail.php?id='.$value['id'].'"><button type="button" class="btn btn-outline-primary w-100" >Xem chi tiết</button></a>
                  </div>
                  </div>
                </div>
              ';
            }
          ?>
        </div>
      </div>
<style>
  #btn_search{
    padding:5px 10px;
    position: absolute;
    right:0;
  }
  #search{
    margin-right:10px;
    width:100%;
  }
</style>
<?php
    require_once('./layout/footer.php'); // gọi file footer để load menu
?>

