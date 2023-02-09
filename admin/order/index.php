<?php
    $title = 'Quản lý Tour';
    $Url = '../';
    require_once('../layouts/header.php');
    $sql="select tour.title as tour_name,tour.discount,order_tour.id,order_tour.fullname,order_tour.email,order_tour.phone_number,order_tour.date,order_tour.status from tour inner join order_tour on tour.id = order_tour.tour_id where order_tour.status = '0'";
    $data = executeResult($sql);
    $sql1="select tour.title as tour_name,tour.discount,order_tour.id,order_tour.fullname,order_tour.email,order_tour.phone_number,order_tour.date,order_tour.status from tour inner join order_tour on tour.id = order_tour.tour_id where order_tour.status = '1'";
    $data1 = executeResult($sql1);
?>
<div class="container">
    <h2 style="text-align:center;margin-top:1em;">Quản lý tour</h2>
    <div class="row" style="width:100%;">
        <div class="col-md-6" style="border-right:1px solid;">
                <?php
                    foreach($data as $value){
                        
                        echo'
                        <div class="jumbotron ">
                            <h6 style="text-align:center;">'.$value['tour_name'].'</h6>
                            <p>Tên: '.$value['fullname'].'</p>
                            <p>Email: '.$value['email'].'</p>
                            <p>SĐT: '.$value['phone_number'].'</p>
                            <p>Giá: '.number_format($value['discount']).' VNĐ</p>
                            <p>Ngày đi: '.$value['date'].'</p>';
                            if($value['status']==0){
                                echo'<p>Trạng thái: <span class="text-warning">Đang chờ xử lý</span><p>';
                            }
                            echo'
                            <a><button class="btn btn-success" onclick="Update('.$value['id'].',1)">Xác nhận</button></a>
                            <button class="btn btn-danger" onclick="Delete('.$value['id'].')">Hủy</button>
                        </div>';
                          
                    }
                ?>     
        </div>
        
        <div class="col-md-6">
            
            
            <?php
                foreach($data1 as $value){
                    echo'
                    <div class="jumbotron" >
                            <h6 style="text-align:center;">'.$value['tour_name'].'</h6>
                            <p>Tên: '.$value['fullname'].'</p>
                            <p>Email: '.$value['email'].'</p>
                            <p>SĐT: '.$value['phone_number'].'</p>
                            <p>Giá: '.number_format($value['discount']).' VNĐ</p>
                            <p>Ngày đi: '.$value['date'].'</p>';
                            if($value['status']==1){
                                echo'<p>Trạng thái:<span class="text-success"> Thành công</span><p>';
                            }
                            echo'
                            <button class="btn btn-danger" onclick="Delete('.$value['id'].')">Hủy</button>
                    </div>';
                        
                }
            ?>
        </div>
    </div>       
</div>
<script>
    function Update(id, status) {
		$.post('api.php', {
			'id': id,
			'status': status,
			'action': 'update'
		}, function(data) {
			location.reload()
		})
	}
    function Delete(id){
        option= confirm('Bạn có muốn hủy tour này không?');
        if(!option) return;
        $.post('api.php',{
            'id': id,
            'action':'delete'
        },function(data){
            location.reload();
    })
    }
</script>


<?php
    require_once('../layouts/footer.php');
?>