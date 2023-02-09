<?php
    $title = 'Đặt tour';
    require_once('layout/header.php');
    $id = getGet('id');
    $query = "select * from tour where id= $id";
    $rs = executeResult($query);
?>
<div class="container">
    <div class="row" style="margin-top:100px;">
        <div class="col-md-6">
        <form method="post">
                <label for="">Họ tên:</label>
                <input type="text" class="form-control" id = "name" name = "name" >
                <label for="">Email:</label>
                <input type="email" class="form-control" id = "email" name = "email" >
                <label for="">SĐT:</label>
                <input type="tel" class="form-control" id = "sdt" name = "sdt" pattern ="[0-9]{9,12}">
                <label for="">Số người:</label>
                <input type="number" class="form-control" id = "number" min="1" max="5" name = "number">
                <label for="">Ghi chú:</label>
                <textarea name="nonet" id="note" class="form-control" cols="30" rows="10"></textarea>
                <label for="">Ngày đi:</label>
                <input type="date" class="form-control" id = "date" name = "date" >
                <button  type ="submit" class="btn btn-success" style="margin-top:15px;" >Đặt tour</button>
            </form>
            
        </div>
        <div class="col-md-6">
            <?php
                foreach($rs as $value){
                    echo'
                        <div class="card">
                        <img src = "'.$value['thumbnail'].'">
                        <div style="padding:10px 15px;">
                            <p>Tên: '.$value['title'].'</p>
                            <p style="color:red">Giá: '.number_format($value['discount']).'đ</p>
                        </div>
                        </div>
                        <p>Mô tả: '.$value['description'].'</p>
                        ';
                }
            ?>
        </div>
    </div>

<?php
    $id = getGet('id');
    $query = "select * from tour where id = $id";
    $rs = executeResult($query);
    if(!empty($_POST['sdt'])&&!empty($_POST['name'])){
        $name = getPOST('name');
        $email = getPOST('email');
        $sdt = getPOST('sdt');
        $number = getPOST('number');
        $note = getPOST('note');
        $date = getPOST('date');
        $total = 0;
        
        $order_date = date('Y-m-d H:i:s');
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
    require_once('layout/footer.php');
?>