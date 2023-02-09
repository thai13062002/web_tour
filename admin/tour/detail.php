<?php
    $title = 'Thông tin chi tiết tour';
    $Url = '../';
    require_once('../layouts/header.php');
    $id = getGet('id');
    $query = "select * from tour where id = $id";
    $rs = executeResult($query);
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <?php
                foreach($rs as $value){
                    echo'<img src = "'.path($value['thumbnail']).'" style="width:100%;"> ';
                }
            ?>
        </div>
        <div class="col-md-8">
            <?php
                foreach($rs as $value){
                    
                    echo'
                    <div class="jumbotron"  style = "height:100%;position:relative;">
                        <p>'.$value['title'].'</p>
                        <p>Giá: '.number_format($value['price']).'đ</p>
                        <p>Giảm giá: '.number_format($value['discount']).'đ</p>
                        <p>Thời gian đi: '.$value['day'].'</p>
                        <a class="btn btn-success" href="hotel.php?id='.$value['id'].'" >Thêm khách sạn</a>
                        <a href="galery.php?id='.$value['id'].'" class="btn btn-success" >Thêm ảnh</a>
                    </div>
                    ';
                }
            ?>
            
        </div>
    </div>
    <?php 
        foreach($rs as $value){
            echo'<p>Điểm nổi bật:</br>'.$value['description'].'</p>';
        }
    ?>

</div>