<?php
    $title = 'Thêm khách sạn';
    $Url = '../';
    require_once ('../layouts/header.php');
?>
<div class="container">
    <form action="" method ="post">
        <label for="">Tên<span class="text-danger">*</span></label>
        <input type="text" name = "name_hotel" class="form-control">
        <button type="submit" class="btn btn-success " style ="margin-top:10px;">Thêm</button>
    </form>
</div>
<?php
    if(!empty($_POST['name_hotel'])){
        $name = getPOST('name_hotel');
        $id = getGet('id');
        $query = "insert into hotel(name,tour_id) values('$name',$id)";
        execute($query);
        echo"<script>alert('Thêm thành công')</script>";
        
    }
    require_once('../layouts/footer.php');
?>