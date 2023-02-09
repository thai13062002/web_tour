<?php
    $title = 'Chi tiết tour';
    require_once('layout/header.php');
    $id = getGet('id');
    $sql = "select tour.*,category.name as category_name from tour inner join category on tour.category_id = category.id where tour.id = $id";
    $data = executeResult($sql);
    $id = getGet('id');
    $query = " select hotel.* from hotel inner join tour on hotel.tour_id = tour.id where tour.id = $id";
    $rs = executeResult($query);
    $name_hotel = '';
    foreach($rs as $value){
        $name_hotel = $value['name'];
    }
    $sql1 = "select * from galery where tour_id = $id";
    $data1 = executeResult($sql1);
?>
<div class="container" style="margin-bottom:100px;">
    <div class="row" style="margin-top:100px;">
        <div class="col-md-8 card">
        <?php
                foreach($data as $value){
                    echo'
                        <div style="height:500px;">
                            <img src = "'.$value['thumbnail'].'" style="height:100%;width:100%">
                        </div>';
                }
            ?>
            
        </div>
        
        <div class="col-md-4">
        <?php   
                foreach($data as $value){
                    echo'
                        <div style="margin:auto 0;">
                        <p>Tour: '.$value['title'].'</p>
                        <p>Danh mục: '.$value['category_name'].'</p>
                        <p>Giá: '.number_format($value['discount']).'đ <span style="color:red;text-decoration:line-through;font-size:15px">'.number_format($value['price']).'đ</span></p>
                        <p>Thời gian: '.$value['day'].'</p>
                        <p>Khách sạn: '.$name_hotel.',...</p>
                        <a href="order.php?id='.$value['id'].'"><button class="btn btn-danger"><i class="far fa-shopping-cart" style="margin-right:15px;"></i>Đặt tour</button></a>
                        </div>';
                }
            ?>
        </div>
    </div>
    <?php
        foreach($data as $value){
            echo'<p>Mô tả:</br> '.$value['description'].'</p>';
        }
    ?>
    <div class="row">
        <?php
            foreach($data1 as $value){
                echo'<div class="col-md-3 col-6">
                    <img src = "'.$value['thumbnail'].'" style = "width:100%;margin-bottom:20px;" >
                </div>';
            }
        ?>
    </div>
</div>
   

<?php
    require_once('layout/footer.php');
?>