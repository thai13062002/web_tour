<?php
    $title = 'Thêm ảnh';
    $Url = '../';
    require_once ('../layouts/header.php');
?>
<div class="container">
    <form method="post" enctype="multipart/form-data">
        <label>Hình ảnh</label>
        <input type="file" class="form-control" id="img" name="img"  accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
        <button type="submit" class="btn btn-success">Thêm</button>
    </form>
</div>
<?php  
    if(!empty($_FILES['img'])){
        $id = getGet('id');
        $img = uploadFile('img');
        $query = " insert into galery(tour_id,thumbnail) values($id,'$img')";
        execute($query);
        echo"<script>alert('Thêm ảnh thành công!')</script>";
    }
   
    require_once('../layouts/footer.php');
?>