<?php
    $title = 'Tìm kiếm';
    require_once('layout/header.php');
    if(!empty($_POST['search'])){
        $search = getPOST('search');
        $sql1= "select * from tour  where title like '%$search%' ";
        $data1 = executeResult($sql1);
        
    }
?>
<div class="container">
<div class="row" style="margin-top:100px;">
    <?php
        $search = getPOST('search');
        $query = "select count(*) as total from tour  where title like '%$search%'";
        $rs = executeResult($query);
        foreach($rs as $value){
            if($value['total']<=0){
                echo"<h2>Không có kết quả tìm kiếm nào cho $search!<h2>";
            }
        }
        foreach($data1 as $value){
            echo'
                <div class="col-md-4 col-sm-6 " style="margin-bottom:150px;">
                  <div class="card" style="margin: 0 auto;">
                  <img src="'.path($value['thumbnail'],'./').'" style="height:192px;"></img>
                  <p style="padding:0 15px;margin-top:20px;">Tour: '.$value['title'].'</p>
                  <p style="padding:0 15px;color:red"><span style="color:black;">Giá:</span> '.number_format($value['discount']).'đ</p>
                  <div class="bt">
                    <a href="order.php?id='.$value['id'].'"><button class="btn btn-danger w-100 class="btn btn-primary" data-toggle="modal" data-target="#myModal"" style="margin-bottom:5px;"><i class="far fa-shopping-cart" style="margin-right:15px;"></i>Đặt ngay</button></a>
                    <a href="detail.php?id='.$value['id'].'"><button type="button" class="btn btn-outline-primary w-100" >Xem chi tiết</button></a>
                  </div>
                  </div>
                </div>
              ';
            }
          ?>
</div>
</div>
<?php
    require_once('./layout/footer.php'); // gọi file footer để load menu
?>