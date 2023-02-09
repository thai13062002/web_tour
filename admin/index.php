<?php

  $title = "Dashboard Page";
  $Url = '';
  require_once 'layouts/header.php';
  $query = "select order_tour.*,tour.title,tour.day from order_tour inner join tour on tour.id = order_tour.tour_id where order_tour.status = 0";
  $data = executeResult($query);
  $count = "select count(*) as total from order_tour where status = 0";
  $rs = executeResult($count);
?>
<div class="container">
  <?php
    foreach($rs as $value){
      if($value['total']<=0){
        echo'<h2 style="text-align:center;margin-top:1em;">Không có đơn nào cần xử lý!</h2>';
      }
    }
    foreach($data as $value){
      echo'
        <div class="alert alert-info alert-dismissible">
          <p><strong>Thông báo!</strong> '.$value['title'].' được đặt vào lúc '.$value['order_date'].' </p>
        </div>
      ';
    }
  ?>
</div>
<?php
require_once 'layouts/footer.php';
?>