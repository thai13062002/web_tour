<?php
    $title = 'Danh mục tour';
    require_once('layout/header.php'); 
    // gọi file header để load menu 
    $id = getGet('id');
    $sql1= "select * from tour  where category_id= $id ";
    $data1 = executeResult($sql1);
    $query = "select count(*) as total, category.name as name from tour  inner join category on tour.category_id = category.id where tour.category_id = $id";
    $rs = executeResult($query);
    $total = 0;$name ='';
    
    
?>
<div class="container" >
<?php
    foreach($rs as $value){
      $total = $value['total'];
      $name = $value['name'];
    }
    if($total<=0){
      echo'<h2 style="margin-top:100px;">Không tìm thấy kết quả cho: '.$name.'!</h2>';
    }?>
<div class="row" style="margin-top:100px;">
          <?php
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
    $id = getGet('id');
    $query = "select * from tour where id = $id";
    $rs = executeResult($query);
    if(!empty($_POST)){
        $name = getPOST('name');
        $email = getPOST('email');
        $sdt = getPOST('sdt');
        $number = getPOST('number');
        $note = getPOST('note');
        $date = getPOST('date');
        $total = 0;
        echo"$name $sdt";
        $order_date = date('Y-m-d H:s:i');
        foreach($rs as $value){
            $total += (int)$number*(int)$value['discount'];
        }
        
        if($note !=''){
            $insert = "insert into order_tour(tour_id, fullname, email, phone_number, note, order_date,date,status, total_money) values ($id, '$name', '$email', '$sdt', '$note', '$order_date', '$date', 0, '$total')";
        }
        else{
            $insert = "insert into order_tour(tour_id, fullname, email, phone_number, order_date,date,status, total_money) values ($id, '$name', '$email', '$sdt', '$order_date', '$date', 0, '$total')";
        }
        execute($insert);
        echo"<script>alert('Đặt thành công!')</script>";
        
    }
?>
<?php
    require_once('./layout/footer.php'); // gọi file footer để load menu
?>