<?php
    $title = 'Tra cứu tour';
    require_once('layout/header.php');
    
?>
<div class="container" style="margin-top:100px;">
  
  <div class="row" >
    <div class="col-md-6">
      <form method="post"  class="form-inline">
        <input type="tel" pattern = "[0-9]{9,12}" class="form-control mr-sm-2" name ="search"require="true" placeholder="Nhập số điện thoại..">
        <button type = "submit" class="btn btn-info"><i class="fas fa-search"></i></button>
      </form>
    </div>
  <div class="col-md-6"> 
    <?php
      if(!empty($_POST['search'])){
        $sdt = getPOST('search');
        $query = "select count(*) as total from order_tour  where phone_number = $sdt";
        $rs = executeResult($query);
        foreach($rs as $value){
            if($value['total']<=0){
                echo"<h2>Không có kết quả tìm kiếm nào cho $sdt!<h2>";
            }
        }
      }
      if(!empty($_POST['search'])){
        $sdt = getPOST('search');
        $query = "select order_tour.*,tour.title,tour.day from order_tour inner join tour on tour.id = order_tour.tour_id where phone_number = $sdt";
        $rs = executeResult($query);
          
        foreach($rs as $value){
          echo'
              <div class="jumbotron" style="padding:10px 20px;margin-bottom:10px;">
                <h3>Thông tin booking</h3>
                <p>Tour: '.$value['title'].'</p>
                <p>Tên: '.$value['fullname'].'</p>
                <p>Email: '.$value['email'].'</p>';
                if($value['note']!=''){
                  echo'<p>Note: '.$value['note'].'</p>';
                }
                echo'
                <p>Ngày đi: '.$value['date'].'</p>
                <p>Thời gian đi: '.$value['day'].'</p>
                <p>Giá: '.number_format($value['total_money']).'đ</p>';
                if($value['status']==0){
                  echo'<p>Trạng thái: <span class="text-warning">Đang chờ xử lý</span></p>';
                }
                else{
                  echo'<p>Trạng thái: <span class="text-success">Thành công</span></p>';
                }
        }
          }
          ?>
  </div>  

</div>

<?php
  require_once('./layout/footer.php'); // gọi file footer để load menu
?>

